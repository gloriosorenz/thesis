<?php

use Illuminate\Database\Seeder;

class DamageReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('damage_reports')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/damagereports.sql'));
        }
    }
}
