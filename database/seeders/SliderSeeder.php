<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = array(
            array('id' => '1', 'image' => '/uploads/slider_img_1.png', 'offer' => '30%', 'title' => 'Different spice for a Different taste', 'sub_title' => 'Fast Food & Restaurants', 'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'button_link' => NULL, 'status' => '1', 'created_at' => '2024-06-21 14:56:37', 'updated_at' => '2024-06-21 14:57:07'),
            array('id' => '2', 'image' => '/uploads/slider_img_2.png', 'offer' => '45%', 'title' => 'Eat healthy. Stay healthy.', 'sub_title' => 'Fast Food & Restaurants', 'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'button_link' => NULL, 'status' => '1', 'created_at' => '2024-06-21 14:58:29', 'updated_at' => '2024-06-21 14:58:29'),
            array('id' => '3', 'image' => '/uploads/slider_img_3.png', 'offer' => '50%', 'title' => 'Great food. Tastes good.', 'sub_title' => 'Fast Food & Restaurants', 'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.', 'button_link' => NULL, 'status' => '1', 'created_at' => '2024-06-21 14:59:24', 'updated_at' => '2024-06-21 14:59:24')
        );

        DB::table('sliders')->insert($sliders);
    }
}
