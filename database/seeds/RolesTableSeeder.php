<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator',],
            ['id' => 2, 'title' => 'Rice Farmer',],
            ['id' => 3, 'title' => 'Rice Miller',],
            ['id' => 4, 'title' => 'Animal Farmer',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
