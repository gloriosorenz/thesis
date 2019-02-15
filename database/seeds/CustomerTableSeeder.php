<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
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
                'company' => 'Sta. Rosa Rice Millers', 
                'customer_types_id' => 1,
                'users_id' => 3, 
            ],
        ];

        foreach ($items as $item) {
            \App\Customer::create($item);
        }
    
    }
}
