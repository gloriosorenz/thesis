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
                'company' => 'Salbabida Farmer Corp.',
                'street'=> '52 Cataduaan St.',
                'no_farmers' => 30,
                'hectares' => 40.50,
                'roles_id' => 2, 
                'barangays_id'=> 4,
                'cities_id'=> 433,
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
                'roles_id' => 3, //Customer
                'barangays_id'=> 4,
                'remember_token' => '',
            ],
            [
                'id' => 4, 
                'first_name' => 'Kanor', 
                'last_name' => 'Robledo', 
                'phone' => '09178484154',
                'email' => 'kanor@robledo.com', 
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Magsasaka Co.',
                'street'=> '68 Aduana St.',
                'roles_id' => 4, 
                'barangays_id'=> 8,
                'cities_id'=> 433,
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
                'first_name' => 'Carlo', 
                'last_name' => 'Ortega', 
                'email' => 'c@o.c', 
                'phone' => '09178484154',
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Ortega Foundation',
                'street'=> '1 Magallanes St.',
                'roles_id' => 4, 
                'barangays_id'=> 2,
                'cities_id'=> 433,
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
                'street'=> '18 Legazpi St.',
                'roles_id' => 4, 
                'barangays_id'=> 7,
                'cities_id'=> 433,
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
                'roles_id' => 3, 
                'street'=> '42 Barcelona St.',
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],

            //FARMER SEEDERS
            [
                'id' => 10, 
                'first_name' => 'Larry', 
                'last_name' => 'Aristorenas', 
                'email' => 'larryaristorenas@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Samahan ng Magsasaka sa Sta. Rosa Laguna', //temp
                'no_farmers' => 18, //temp
                'hectares' => 19.10, //temp
                'roles_id' => 2, 
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],

            [
                'id' => 11, 
                'first_name' => 'Gregorio', 
                'last_name' => 'Trinidad', 
                'email' => 'gregtrinidad@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Makabling River Irrigators',
                'no_farmers' => 18, //temp
                'hectares' => 20.10, //temp
                'roles_id' => 2,
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 12, 
                'first_name' => 'Eduardo', 
                'last_name' => 'Umali', 
                'email' => 'eduardoumali@yahoo.com',  //temp
                'phone' => '09178484154', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Diezmo River Irrigators Association',
                'no_farmers' => 18, //temp
                'hectares' => 19.10, //temp
                'roles_id' => 2, 
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],

                // CUSTOMER SEEDERS

            [
                'id' => 13, 
                'first_name' => 'Judith', 
                'last_name' => 'Velasco', 
                'email' => 'jmvricemillers@gmail.com',  //temp
                'phone' => '09189277549', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'JMV Ricemill',
                'roles_id' => 3, 
                'street'=> 'Blk 843 Francis 7 Subd.', //temp
                'barangays_id'=> 11217, //Dita
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 14, 
                'first_name' => 'Luigi', 
                'last_name' => 'Panaguiton', 
                'email' => 'luigipanaguiton@gmail.com',  //temp
                'phone' => '09170928492', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 3,
                'street'=> '96 Fort St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 15, 
                'first_name' => 'Jan', 
                'last_name' => 'Domingo', 
                'email' => 'jandomingo@gmail.com',  //temp
                'phone' => '09170194829', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'roles_id' => 4, 
                'street'=> '42 Taft St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
                'provinces_id'=> 19,
                'remember_token' => '',
            ],
            [
                'id' => 16, 
                'first_name' => 'Don', 
                'last_name' => 'Macadat', 
                'email' => 'donmac@yahoo.com',  //temp
                'phone' => '09179528529', //temp
                'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 
                'company' => 'Mac Greens Association',
                'roles_id' => 4, 
                'street'=> '42 Barcelona St.', //temp
                'barangays_id'=> 7,
                'cities_id'=> 433,
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
