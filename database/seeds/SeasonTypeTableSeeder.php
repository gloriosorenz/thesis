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
                'type' => "Wet", //March 16 -> Sept. 15 (March, April, May, June, July, August, September)
            ],
            [
                'id' => 2, 
                'type' => "Dry", //Sept. 16 -> March 15 (September, October, November, December, January, February, March)
            ],

        ];

        foreach ($items as $item) {
            \App\SeasonType::create($item);
        }
    }
}
