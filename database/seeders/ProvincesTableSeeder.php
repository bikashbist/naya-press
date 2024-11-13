<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('provinces')->insert([
                'province_en' => "Province 1",
                'province_np' => "प्रदेश १",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Province 2",
                'province_np' => "प्रदेश २",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Bagmati",
                'province_np' => "बागमती प्रदेश",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Gandaki",
                'province_np' => "गण्डकी प्रदेश",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Lumbini",
                'province_np' => "लुम्बिनी प्रदेश",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Karnali",
                'province_np' => "कर्णाली प्रदेश",
            ]);
            DB::table('provinces')->insert([
                'province_en' => "Sudurpaschim",
                'province_np' => "सुदूरपश्चिम प्रदेश",
            ]);
        }
    }
}
