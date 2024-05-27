<?php

namespace App\Services;

use App\Models\PaymentGatewaySetting;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class PaymentGatewaySettingService
{

    function getSettings()
    {
        return Cache::rememberForever('paymentGateways', function () {
            return PaymentGatewaySetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings(): void
    {
        $paymentGatewaySettings = $this->getSettings();

        config()->set('paymentGateways', $paymentGatewaySettings);
    }

    function clearCachedSettings(): void
    {
        Cache::forget('paymentGateways');
    }
}
