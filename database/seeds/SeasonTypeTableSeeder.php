<?php

use Illuminate\Database\Seeder;

class SeasonTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            [
                'id' => 1, 
                'type' => "Wet", 
            ],
            [
                'id' => 2, 
                'type' => "Dry", 
            ],

        ];

        foreach ($items as $item) {
            \App\SeasonType::create($item);
        }
    }
}
