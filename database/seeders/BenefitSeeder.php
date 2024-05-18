<?php

namespace Database\Seeders;

use App\Models\SectionTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' => 'benefit_top_title',
                'value' => 'Great Service'
            ],
            [
                'key' => 'benefit_main_title',
                'value' => 'Great Service'
            ],
            [
                'key' => 'benefit_sub_title',
                'value' => 'Great deal with us only'
            ],
        ]);
    }
}
