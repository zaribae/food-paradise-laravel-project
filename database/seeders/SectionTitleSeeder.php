<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section_titles = array(
            array('id' => '1', 'key' => 'benefit_top_title', 'value' => 'Why Choose Us', 'created_at' => NULL, 'updated_at' => '2024-06-04 13:23:31'),
            array('id' => '2', 'key' => 'benefit_main_title', 'value' => 'Why Choose Us', 'created_at' => NULL, 'updated_at' => '2024-06-04 13:23:31'),
            array('id' => '3', 'key' => 'benefit_sub_title', 'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', 'created_at' => NULL, 'updated_at' => '2024-06-04 13:23:31'),
            array('id' => '4', 'key' => 'daily_offer_top_title', 'value' => 'Daily Offer', 'created_at' => '2024-06-04 13:18:29', 'updated_at' => '2024-06-04 13:18:29'),
            array('id' => '5', 'key' => 'daily_offer_main_title', 'value' => 'Up To 30% Off For This Day', 'created_at' => '2024-06-04 13:18:29', 'updated_at' => '2024-06-04 13:18:29'),
            array('id' => '6', 'key' => 'daily_offer_sub_title', 'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', 'created_at' => '2024-06-04 13:19:18', 'updated_at' => '2024-06-04 13:19:18'),
            array('id' => '7', 'key' => 'chef_top_title', 'value' => 'Our Team', 'created_at' => '2024-06-05 14:40:43', 'updated_at' => '2024-06-05 14:40:43'),
            array('id' => '8', 'key' => 'chef_main_title', 'value' => 'Meet Our Expert Chefs', 'created_at' => '2024-06-05 14:40:43', 'updated_at' => '2024-06-05 14:40:43'),
            array('id' => '9', 'key' => 'chef_sub_title', 'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', 'created_at' => '2024-06-05 14:40:43', 'updated_at' => '2024-06-05 14:40:43'),
            array('id' => '10', 'key' => 'testimonial_top_title', 'value' => 'Testimonial', 'created_at' => '2024-06-06 08:05:42', 'updated_at' => '2024-06-06 08:05:42'),
            array('id' => '11', 'key' => 'testimonial_main_title', 'value' => 'Our Customer Feedbacks', 'created_at' => '2024-06-06 08:05:42', 'updated_at' => '2024-06-06 08:05:42'),
            array('id' => '12', 'key' => 'testimonial_sub_title', 'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', 'created_at' => '2024-06-06 08:05:42', 'updated_at' => '2024-06-06 08:05:42')
        );

        DB::table('section_titles')->insert($section_titles);
    }
}
