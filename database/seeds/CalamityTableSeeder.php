<?php

use Illuminate\Database\Seeder;

class CalamityTableSeeder extends Seeder
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
                'type' => "Typhoon", 
            ],
            [
                'id' => 2, 
                'type' => "Flood", 
            ],
            [
                'id' => 3, 
                'type' => "Drought", 
            ],
            [
                'id' => 4, 
                'type' => "Infestation", 
            ],
            [
                'id' => 5, 
                'type' => "Earthquake", 
            ],
            [
                'id' => 6, 
                'type' => "Volcanic Eruption", 
            ],

        ];

        foreach ($items as $item) {
            \App\Calamity::create($item);
        }
    }
}
