<?php

namespace Database\Seeders;

use App\Model\Dcms\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::create([
        //     // 'parent_id' => 0,
        //     // 'name'      => 'Uncategorized',
        //     // 'slug'      => 'uncategoriezed',
        //     // 'category_post_count' => 0
            
        // ]);
        DB::table('settings')->insert([
            'language' => 1
        ]);
    }
}
