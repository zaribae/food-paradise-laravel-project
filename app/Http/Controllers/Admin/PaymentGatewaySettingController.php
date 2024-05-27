<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGatewaySetting;
use App\Services\PaymentGatewaySettingService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentGatewaySettingController extends Controller
{
    use FileUploadTrait;

    function index(): View
    {
        $paymentsSetting = PaymentGatewaySetting::pluck('value', 'key');
        return view('admin.setting.payment-gateway.index', compact('paymentsSetting'));
    }

    function paypalSettingUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'paypal_status' => ['required', 'boolean'],
            'paypal_acc_mode' => ['required', 'string', 'in:live,sandbox'],
            'paypal_country_name' => ['required'],
            'paypal_currency' => ['required'],
            'paypal_rate' => ['required', 'numeric'],
            'paypal_client_id' => ['required'],
            'paypal_secret' => ['required'],
            'paypal_app_id' => ['required'],
        ]);

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => ['nullable', 'image']
            ]);

            $imagePath = $this->uploadImage($request, 'logo');

            PaymentGatewaySetting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $imagePath],
            );
        }

        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $paymentSettings = app(PaymentGatewaySettingService::class);
        $paymentSettings->clearCachedSettings();

        toastr()->success('Settings Updated Successfully!');

        return redirect()->back();
    }
}
