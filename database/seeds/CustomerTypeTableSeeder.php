<?php

use Illuminate\Database\Seeder;

class CustomerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'type' => 'Rice Miller',],
            ['id' => 2, 'type' => 'Animal Farmer',],

        ];

        foreach ($items as $item) {
            \App\CustomerType::create($item);
        }
    }
}
