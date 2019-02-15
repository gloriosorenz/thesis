<?php

use Illuminate\Database\Seeder;

class RiceFarmerTableSeeder extends Seeder
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
                'company' => 'RK Farmer Corp.', 
                'users_id' => 2, 
                'no_farmers' => 30,
                'hectares' => 40.50,
            ],
            [
                'id' => 2, 
                'company' => 'Magsasaka Co.', 
                'users_id' => 4, 
                'no_farmers' => 110,
                'hectares' => 20.30,
            ],
            [
                'id' => 3, 
                'company' => 'Ka Larry Foundation', 
                'users_id' => 6, 
                'no_farmers' => 200,
                'hectares' => 30.10,
            ],

        ];

        foreach ($items as $item) {
            \App\RiceFarmer::create($item);
        }
    }
}
