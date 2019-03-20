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
                'type' => "Drought", 
            ],
            [
                'id' => 3, 
                'type' => "Infestation/Pest", 
            ],
            [
                'id' => 4, 
                'type' => "Plant Disease", 
            ],
            [
                'id' => 5, 
                'type' => "Landslide", 
            ],
            [
                'id' => 6, 
                'type' => "Earthquake", 
            ],

        ];

        foreach ($items as $item) {
            \App\Calamity::create($item);
        }
    }
}
