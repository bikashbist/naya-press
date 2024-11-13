<?php

use Illuminate\Database\Seeder;
use App\Model\Dcms\SchoolsData;

class NationalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolsData::create(['state'=> 'State One']);
        SchoolsData::create(['state'=> 'State Two']);
        SchoolsData::create(['state'=> 'State Three']);
        SchoolsData::create(['state'=> 'State Four']);
        SchoolsData::create(['state'=> 'State Five']);
        SchoolsData::create(['state'=> 'State Six']);
        SchoolsData::create(['state'=> 'State Seven']);
    }
}
