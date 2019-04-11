<?php

use Illuminate\Database\Seeder;

class CropStageTableSeeder extends Seeder
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
                'stage' => 'Seedling', 
            ],
            [
                'id' => 2, 
                'stage' => 'Vegetative', 
            ],
            [
                'id' => 3, 
                'stage' => 'Reproductive', 
            ],
            [
                'id' => 4, 
                'stage' => 'Maturing', 
            ],
            [
                'id' => 5, 
                'stage' => 'Harvested (Unthreshed)', 
            ],
        ];

        foreach ($items as $item) {
            \App\CropStage::create($item);
        }
    }
}
