<?php

use Illuminate\Database\Seeder;

class DamageDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('damage_datas')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/damagedata.sql'));
        }
    }
}
