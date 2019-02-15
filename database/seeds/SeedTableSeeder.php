<?php

use Illuminate\Database\Seeder;

class SeedTableSeeder extends Seeder
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
                'name' => 'Good', 
                'type' => "", 
                'active' => true, 
            ],
            // [
            //     'id' => 2, 
            //     'name' => 'Hybrid', 
            //     'type' => "", 
            //     'active' => true, 
            // ],
            [
                'id' => 2, 
                'name' => 'Certified', 
                'type' => "", 
                'active' => true, 
            ],

        ];

        foreach ($items as $item) {
            \App\Seed::create($item);
        }
    }
}
