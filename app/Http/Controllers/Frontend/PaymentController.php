<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Events\RealTimeOrderPlacedNotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrdersService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    function index(): View
    {
        if (!session()->has('delivery_cost') || !session()->has('address')) {
            throw ValidationException::withMessages(['Something went Wrong!']);
        }

        $cartTotalPrice = cartTotalPrice();
        $deliveryCost = session()->get('delivery_cost') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $subtotalPrice = subTotalPrice($deliveryCost);

        return view('frontend.pages.payment', compact('cartTotalPrice', 'deliveryCost', 'discount', 'subtotalPrice'));
    }

    function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    function paymentCancel()
    {
        return view('frontend.pages.payment-canceled');
    }

    function makePayment(Request $request, OrdersService $ordersService)
    {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal']
        ]);

        // Create Order
        if ($ordersService->createOrder()) {
            switch ($request->payment_gateway) {
                case 'paypal':
                    return response([
                        'redirect_url' => route('paypal.payment')
                    ]);
                    break;

                default:
                    break;
            }
        }
    }

    function setPaypalConfig(): array
    {
        $config = [
            'mode'    => config('paymentGateways.paypal_acc_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('paymentGateways.paypal_client_id'),
                'client_secret'     => config('paymentGateways.paypal_secret'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('paymentGateways.paypal_client_id'),
                'client_secret'     => config('paymentGateways.paypal_secret'),
                'app_id'            => config('paymentGateways.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('paymentGateways.paypal_currency'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => true, // Validate SSL when creating api client.
        ];

        return $config;
    }

    function payWithPaypal()
    {
        $config = $this->setPaypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        // Calculate pay amount
        $grandTotal = session()->get('grand_total');
        $payAmount = round($grandTotal * config('paymentGateways.paypal_rate'));

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.payment.success'),
                'cancel_url' => route('paypal.payment.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paymentGateways.paypal_currency'),
                        'value' => $payAmount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('payment-cancel')->withErrors([
                'error' => $response['error']['message'],
            ]);
        }
    }

    function paypalSuccess(Request $request, OrdersService $ordersService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $orderId = session()->get('order_id');
            $captures = $response['purchase_units'][0]['payments']['captures'][0];
            $paymentInfo = [
                'transaction_id' => $captures['id'],
                'currency' => $captures['amount']['currency_code'],
                'status' => $captures['status'],
            ];

            OrderPaymentUpdateEvent::dispatch($orderId, $paymentInfo, 'PayPal');
            OrderPlacedNotificationEvent::dispatch($orderId);
            RealTimeOrderPlacedNotificationEvent::dispatch(Order::find($orderId));

            // Clear all payment session
            $ordersService->clearSession();

            return redirect()->route('payment-success');
        } else {
            return redirect()->route('payment-cancel')->withErrors([
                'error' => $response['error']['message'],
            ]);
        }
    }

    function paypalCancel()
    {
        return redirect()->route('payment-canceled');
    }
}
