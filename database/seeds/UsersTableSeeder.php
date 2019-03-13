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
                'company' => 'RK Farmer Corp.',
                'street'=> '52 Cataduaan St.',
                'no_farmers' => 30,
                'hectares' => 40.50,
                'roles_id' => 2, 
                'barangays_id'=> 4,
                'cities_id'=> 282,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 3, 
                'first_name' => 'Adrian', 
                'last_name' => 'Valero', 
                'email' => 'a@d.c', 
                'phone' => '09178416388',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Sta. Rosa Rice Millers',
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
                'company' => 'Magsasaka Co.',
                'no_farmers' => 110,
                'hectares' => 20.30,
                'street'=> '68 Aduana St.',
                'roles_id' => 2, 
                'barangays_id'=> 8,
                'cities_id'=> 282,
                'provinces_id'=> 19,
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
                'company' => 'Ka Larry Foundation',
                'no_farmers' => 200,
                'hectares' => 30.10,
                'street'=> '1 Magallanes St.',
                'roles_id' => 2, 
                'barangays_id'=> 2,
                'cities_id'=> 282,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 7, 
                'first_name' => 'Renz', 
                'last_name' => 'Glorioso', 
                'email' => 'renzgloriosooo@gmail.com', 
                'phone' => '09178416388',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Sta. Rosa Animal Farmers',
                'roles_id' => 3, 
                'barangays_id'=> 9,
                'remember_token' => '',
            ],
            [
                'id' => 8, 
                'first_name' => 'Guy', 
                'last_name' => 'Sabino', 
                'email' => 'g@sab.c', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Guy Sabino Farmery',
                'no_farmers' => 18,
                'hectares' => 19.10,
                'street'=> '18 Legazpi St.',
                'roles_id' => 2, 
                'barangays_id'=> 7,
                'cities_id'=> 282,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 9, 
                'first_name' => 'Jehericho', 
                'last_name' => 'Benechingco', 
                'email' => 'j@b.c', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Benechingco Rice Plantation',
                'no_farmers' => 18,
                'hectares' => 19.10,
                'roles_id' => 2, 
                'street'=> '42 Barcelona St.',
                'barangays_id'=> 7,
                'cities_id'=> 282,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }

        // factory(App\User::class, 10)->create()->each(function($u) {
        //     $u->issues()->save(factory(App\User::class)->make());
        //   });
        
    }
}
