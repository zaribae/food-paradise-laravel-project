<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $benefits = array(
            array('id' => '1', 'icon' => 'fas fa-percent', 'title' => 'Discount Voucher', 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 'status' => '1', 'created_at' => '2024-06-21 15:08:10', 'updated_at' => '2024-06-21 15:08:10'),
            array('id' => '2', 'icon' => 'fas fa-heartbeat', 'title' => 'Fresh Healthy Foods', 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 'status' => '1', 'created_at' => '2024-06-21 15:09:25', 'updated_at' => '2024-06-21 15:09:25'),
            array('id' => '3', 'icon' => 'fas fa-shipping-fast', 'title' => 'Fast Serve On Table', 'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .', 'status' => '1', 'created_at' => '2024-06-21 15:10:36', 'updated_at' => '2024-06-21 15:10:36')
        );

        DB::table('benefits')->insert($benefits);
    }
}
