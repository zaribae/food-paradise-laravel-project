<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array('id' => '1', 'key' => 'site_name', 'value' => 'Food Paradise', 'created_at' => '2024-05-19 15:14:26', 'updated_at' => '2024-05-20 12:27:46'),
            array('id' => '2', 'key' => 'site_default_currency', 'value' => 'USD', 'created_at' => '2024-05-19 15:14:26', 'updated_at' => '2024-05-20 13:14:12'),
            array('id' => '3', 'key' => 'site_currency_icon', 'value' => '$', 'created_at' => '2024-05-19 15:14:26', 'updated_at' => '2024-05-20 13:55:01'),
            array('id' => '4', 'key' => 'site_currency_icon_position', 'value' => 'left', 'created_at' => '2024-05-19 15:14:26', 'updated_at' => '2024-05-20 13:55:01'),
            array('id' => '5', 'key' => 'pusher_app_id', 'value' => '1812427', 'created_at' => '2024-06-01 14:20:52', 'updated_at' => '2024-06-01 14:20:52'),
            array('id' => '6', 'key' => 'pusher_key', 'value' => '47c2a48933494aceeefa', 'created_at' => '2024-06-01 14:20:52', 'updated_at' => '2024-06-01 14:20:52'),
            array('id' => '7', 'key' => 'pusher_secret', 'value' => '2439d83cce11bda330fc', 'created_at' => '2024-06-01 14:20:52', 'updated_at' => '2024-06-01 14:20:52'),
            array('id' => '8', 'key' => 'pusher_cluster', 'value' => 'ap1', 'created_at' => '2024-06-01 14:20:52', 'updated_at' => '2024-06-01 14:20:52'),
            array('id' => '9', 'key' => 'mail_driver', 'value' => 'smtp', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '10', 'key' => 'mail_host', 'value' => 'sandbox.smtp.mailtrap.io', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '11', 'key' => 'mail_port', 'value' => '2525', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '12', 'key' => 'mail_username', 'value' => '56a0134f3ff6d8', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '13', 'key' => 'mail_password', 'value' => '613cb162f7052a', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '14', 'key' => 'mail_encryption', 'value' => 'tls', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:57:06'),
            array('id' => '15', 'key' => 'mail_from_address', 'value' => 'food.paradise@example.com', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:58:13'),
            array('id' => '16', 'key' => 'mail_receive_address', 'value' => 'support.food.paradise@example.com', 'created_at' => '2024-06-09 15:51:28', 'updated_at' => '2024-06-09 15:58:13'),
            array('id' => '17', 'key' => 'logo', 'value' => '/uploads/logo.png', 'created_at' => '2024-06-19 14:41:31', 'updated_at' => '2024-06-19 15:16:57'),
            array('id' => '18', 'key' => 'footer_logo', 'value' => '/uploads/footer_logo.png', 'created_at' => '2024-06-19 14:41:31', 'updated_at' => '2024-06-19 14:41:31'),
            array('id' => '19', 'key' => 'favicon', 'value' => '/uploads/favicon.png', 'created_at' => '2024-06-19 14:41:31', 'updated_at' => '2024-06-19 14:41:31'),
            array('id' => '20', 'key' => 'breadcrumb', 'value' => '/uploads/counter_bg.jpg', 'created_at' => '2024-06-19 14:41:31', 'updated_at' => '2024-06-19 15:39:42'),
            array('id' => '21', 'key' => 'site_email', 'value' => 'ahmadazzhari@gmail.com', 'created_at' => '2024-06-19 15:51:16', 'updated_at' => '2024-06-19 15:51:16'),
            array('id' => '22', 'key' => 'site_phone_number', 'value' => '+6283172514721', 'created_at' => '2024-06-19 15:51:16', 'updated_at' => '2024-06-19 15:51:16'),
            array('id' => '23', 'key' => 'site_color', 'value' => '#f86f03', 'created_at' => '2024-06-19 16:22:42', 'updated_at' => '2024-06-21 08:59:23'),
            array('id' => '24', 'key' => 'site_seo_title', 'value' => 'Food Paradise', 'created_at' => '2024-06-19 17:12:11', 'updated_at' => '2024-06-19 17:12:11'),
            array('id' => '25', 'key' => 'site_seo_description', 'value' => 'test description', 'created_at' => '2024-06-19 17:12:11', 'updated_at' => '2024-06-19 17:12:11'),
            array('id' => '26', 'key' => 'site_seo_keyword', 'value' => 'food,restaurant', 'created_at' => '2024-06-19 17:12:11', 'updated_at' => '2024-06-19 17:12:11')
        );

        DB::table('settings')->insert($settings);
    }
}
