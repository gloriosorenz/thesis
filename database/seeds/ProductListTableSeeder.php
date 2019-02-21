<?php

use Illuminate\Database\Seeder;

class ProductListTableSeeder extends Seeder
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
                'products_id' => 1, 
                'season_lists_id' => 1, 
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70,            
            ],
            [
                'id' => 2, 
                'products_id' => 2, 
                'season_lists_id' => 4, 
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20,            
            ],
            [
                'id' => 3, 
                'products_id' => 3, 
                'season_lists_id' => 7, 
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10,            
            ],
            [
                'id' => 4, 
                'products_id' => 1, 
                'season_lists_id' => 2, 
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70,
            ],
            [
                'id' => 5, 
                'products_id' => 2, 
                'season_lists_id' => 5, 
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20,            
            ],
            [
                'id' => 6, 
                'products_id' => 3, 
                'season_lists_id' => 8, 
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10,            
            ],
            [
                'id' => 7, 
                'products_id' => 1, 
                'season_lists_id' => 3, 
                'price' => 19.0,
                'orig_quantity' => 200,
                'curr_quantity' => 200,           
            ],
            [
                'id' => 8, 
                'products_id' => 2, 
                'season_lists_id' => 6, 
                'price' => 14.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,            
            ],
            [
                'id' => 9, 
                'products_id' => 3, 
                'season_lists_id' => 9, 
                'price' => 0.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,            
            ],

        ];

        foreach ($items as $item) {
            \App\ProductList::create($item);
        }
    }
}
