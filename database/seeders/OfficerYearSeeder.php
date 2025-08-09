<?php

namespace Database\Seeders;

use App\Models\OfficerYear;
use Illuminate\Database\Seeder;

class OfficerYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OfficerYear::create(['year' => '2025']);
    }
}
