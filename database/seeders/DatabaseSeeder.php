<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(PalikaTableSeeder::class);
    }
}
