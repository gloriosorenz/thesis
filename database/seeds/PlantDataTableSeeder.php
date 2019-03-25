<?php

use Illuminate\Database\Seeder;

class PlantDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('plant_datas')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/plantdata.sql'));
        }
    }
}
