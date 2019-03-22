<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producttypes = [
            [
                'id' => 1, 
                'type' => 'Rice Product', 
            ],
            [
                'id' => 2, 
                'type' => 'Withered Product', 
            ],
            [
                'id' => 3, 
                'type' => 'Damaged Product', 
            ],
            [
                'id' => 4, 
                'type' => 'Withered Product', 
            ],

        ];
    
        foreach ($producttypes as $producttype) {
            \App\Product::create($producttype);
        }
    }
}
