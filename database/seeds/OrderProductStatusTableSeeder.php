<?php

use Illuminate\Database\Seeder;

class OrderProductStatusTableSeeder extends Seeder
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
                'status' => "Pending", 
            ],
            [
                'id' => 2, 
                'status' => "Done", 
            ],
            [
                'id' => 3, 
                'status' => "Incomplete", 
            ],
            [
                'id' => 4, 
                'status' => "Cancelled", 
            ],

        ];

        foreach ($items as $item) {
            \App\OrderProductStatus::create($item);
        }
    }
}
