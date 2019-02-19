<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'first_name' => 'Juan', 
                'last_name' => 'Dela Cruz', 
                'email' => 'admin@admin.com', 
                'phone' => '09171234567',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 1, 
                'remember_token' => '',
            ],
            [
                'id' => 2, 
                'first_name' => 'Antonio', 
                'last_name' => 'Desalbabida', 
                'email' => 'ande@gmail.com', 
                'phone' => '09175446351',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 2, 
                'barangays_id'=> 4,
                'remember_token' => '',
            ],
            [
                'id' => 3, 
                'first_name' => 'Adrian', 
                'last_name' => 'Valero', 
                'email' => 'adrian_valero@dlsu.edu.ph', 
                'phone' => '09178416388',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 3, 
                'barangays_id'=> 4,
                'remember_token' => '',
            ],
            [
                'id' => 4, 
                'first_name' => 'Kanor', 
                'last_name' => 'Robledo', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 2, 
                'barangays_id'=> 8,
                'remember_token' => '',
            ],
            [
                'id' => 5, 
                'first_name' => 'A', 
                'last_name' => 'COV', 
                'email' => 'a@y.c', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 1, 
                'remember_token' => '',
            ],
            [
                'id' => 6, 
                'first_name' => 'Ka', 
                'last_name' => 'Larry', 
                'email' => 'k@y.c', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 2, 
                'barangays_id'=> 8,
                'remember_token' => '',
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }

        
    }
}
