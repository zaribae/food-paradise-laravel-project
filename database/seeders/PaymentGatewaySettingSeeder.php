<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentGatewaySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_gateway_settings = array(
            array('id' => '1', 'key' => 'paypal_status', 'value' => '1', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-05-28 07:28:23'),
            array('id' => '2', 'key' => 'paypal_acc_mode', 'value' => 'sandbox', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-05-26 10:25:40'),
            array('id' => '3', 'key' => 'paypal_country_name', 'value' => 'US', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-05-26 10:47:15'),
            array('id' => '4', 'key' => 'paypal_currency', 'value' => 'EUR', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-05-26 14:21:16'),
            array('id' => '5', 'key' => 'paypal_rate', 'value' => '1.08', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-05-26 14:21:16'),
            array('id' => '6', 'key' => 'paypal_client_id', 'value' => 'YOUR_CLIENT_ID', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-06-21 13:33:53'),
            array('id' => '7', 'key' => 'paypal_secret', 'value' => 'YOUR_SECRET_KEY', 'created_at' => '2024-05-26 10:25:40', 'updated_at' => '2024-06-21 13:33:53'),
            array('id' => '8', 'key' => 'logo', 'value' => '/uploads/paypal-logo.png', 'created_at' => '2024-05-26 10:28:04', 'updated_at' => '2024-05-28 07:26:01'),
            array('id' => '9', 'key' => 'paypal_app_id', 'value' => 'YOUR_APP_ID', 'created_at' => '2024-05-28 07:26:01', 'updated_at' => '2024-06-21 13:33:53')
        );

        DB::table('payment_gateway_settings')->insert($payment_gateway_settings);
    }
}
