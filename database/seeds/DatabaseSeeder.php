<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressSeeder::class);
        $this->call(CalamityTableSeeder::class);
        $this->call(SeasonTypeTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderProductStatusTableSeeder::class);

        // $this->call(PhilippineBarangaysTableSeeder::class);
        // $this->call(BarangayTableSeeder::class);
        $this->call(SeasonStatusTableSeeder::class);
        $this->call(SeasonListStatusTableSeeder::class);


        $this->call(CountriesTableSeeder::class);
        // $this->call(CitiesTableSeeder::class);
        // $this->call(ProvincesTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(RiceFarmerTableSeeder::class);
        // $this->call(CustomerTypeTableSeeder::class);
        // $this->call(CustomerTableSeeder::class);
        $this->call(SeedTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        $this->call(SeasonTableSeeder::class);
        $this->call(SeasonListTableSeeder::class);
        $this->call(ProductListTableSeeder::class);


    }
}
