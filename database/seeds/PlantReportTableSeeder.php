<?php

use Illuminate\Database\Seeder;

class PlantReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('plant_reports')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/plantreports.sql'));
        }
    }
}
