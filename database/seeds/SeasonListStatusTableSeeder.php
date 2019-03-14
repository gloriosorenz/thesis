<?php

use Illuminate\Database\Seeder;

class SeasonListStatusTableSeeder extends Seeder
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
                'status' => "Ongoing", 
            ],
            [
                'id' => 2, 
                'status' => "Done", 
            ],

        ];

        foreach ($items as $item) {
            \App\SeasonListStatus::create($item);
        }
    }
}
