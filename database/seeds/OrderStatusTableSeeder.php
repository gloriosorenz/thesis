<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
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
                'status' => "Cancelled", 
            ],

        ];

        foreach ($items as $item) {
            \App\OrderStatus::create($item);
        }
    }
}
