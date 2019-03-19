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
                'seasons_id' => 1, 
                'users_id' => 2,
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70, 
                'harvest_date' => '2019-03-13',           
            ],
            [
                'id' => 2, 
                'products_id' => 2, 
                'seasons_id' => 1, 
                'users_id' => 2,
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20,
                'harvest_date' => '2019-03-13',             
            ],
            [
                'id' => 3, 
                'products_id' => 3, 
                'seasons_id' => 1, 
                'users_id' => 2,
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 4, 
                'products_id' => 1, 
                'seasons_id' => 1, 
                'users_id' => 4,
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70,
                'harvest_date' => '2019-03-13', 
            ],
            [
                'id' => 5, 
                'products_id' => 2, 
                'seasons_id' => 1, 
                'users_id' => 4,
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 6, 
                'products_id' => 3, 
                'seasons_id' => 1, 
                'users_id' => 4,
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 7, 
                'products_id' => 1, 
                'seasons_id' => 2, 
                'users_id' => 4,
                'price' => 19.0,
                'orig_quantity' => 200,
                'curr_quantity' => 200,  
                'harvest_date' => '2019-03-13',          
            ],
            [
                'id' => 8, 
                'products_id' => 2, 
                'seasons_id' => 2, 
                'users_id' => 4,
                'price' => 14.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,      
                'harvest_date' => '2019-03-13',       
            ],
            [
                'id' => 9, 
                'products_id' => 3, 
                'seasons_id' => 2, 
                'users_id' => 4,
                'price' => 0.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,          
                'harvest_date' => '2019-03-13',   
            ],
            [
                'id' => 10, 
                'products_id' => 1, 
                'seasons_id' => 3, 
                'users_id' => 2,
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70, 
                'harvest_date' => '2019-03-13',           
            ],
            [
                'id' => 11, 
                'products_id' => 2, 
                'seasons_id' => 3, 
                'users_id' => 2,
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20,
                'harvest_date' => '2019-03-13',             
            ],
            [
                'id' => 12, 
                'products_id' => 3, 
                'seasons_id' => 3, 
                'users_id' => 2,
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 13, 
                'products_id' => 1, 
                'seasons_id' => 3, 
                'users_id' => 4,
                'price' => 16.0,
                'orig_quantity' => 70,
                'curr_quantity' => 70,
                'harvest_date' => '2019-03-13', 
            ],
            [
                'id' => 14, 
                'products_id' => 2, 
                'seasons_id' => 3, 
                'users_id' => 4,
                'price' => 11.0,
                'orig_quantity' => 20,
                'curr_quantity' => 20, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 15, 
                'products_id' => 3, 
                'seasons_id' => 3, 
                'users_id' => 4,
                'price' => 0.0,
                'orig_quantity' => 10,
                'curr_quantity' => 10, 
                'harvest_date' => '2019-03-13',            
            ],
            [
                'id' => 16, 
                'products_id' => 1, 
                'seasons_id' => 3, 
                'users_id' => 9,
                'price' => 19.0,
                'orig_quantity' => 200,
                'curr_quantity' => 200,  
                'harvest_date' => '2019-03-13',          
            ],
            [
                'id' => 17, 
                'products_id' => 2, 
                'seasons_id' => 3, 
                'users_id' => 9,
                'price' => 14.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,      
                'harvest_date' => '2019-03-13',       
            ],
            [
                'id' => 18, 
                'products_id' => 3, 
                'seasons_id' => 3, 
                'users_id' => 9,
                'price' => 0.0,
                'orig_quantity' => 50,
                'curr_quantity' => 50,          
                'harvest_date' => '2019-03-13',   
            ],

        ];

        foreach ($items as $item) {
            \App\ProductList::create($item);
        }
    }
}
