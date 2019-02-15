<?php

use Illuminate\Database\Seeder;

class BarangayTableSeeder extends Seeder
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
                'name' => 'Tagapo', 
            ],
            [
                'id' => 2, 
                'name' => 'Malitlit', 
            ],
            [
                'id' => 3, 
                'name' => 'Dita', 
            ],
            [
                'id' => 4, 
                'name' => 'Caingin', 
            ],
            [
                'id' => 5, 
                'name' => 'Dila', 
            ],
            [
                'id' => 6, 
                'name' => 'Sinalhan', 
            ],
            [
                'id' => 7, 
                'name' => 'Pooc', 
            ],
            [
                'id' => 8, 
                'name' => 'Labas', 
            ],
            [
                'id' => 9, 
                'name' => 'Balibago', 
            ],
            [
                'id' => 10, 
                'name' => 'Macabling', 
            ],
            [
                'id' => 11, 
                'name' => 'Pulong Sta. Cruz', 
            ],

        ];

        foreach ($items as $item) {
            \App\Barangay::create($item);
        }
    }
}
