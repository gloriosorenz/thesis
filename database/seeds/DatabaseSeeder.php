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

        // Primary Seeders
        $this->call(AddressSeeder::class);
        $this->call(CalamityTableSeeder::class);
        $this->call(SeasonTypeTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderProductStatusTableSeeder::class);
        $this->call(SeasonStatusTableSeeder::class);
        $this->call(SeasonListStatusTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        // Secondary Seeders
        $this->call(UsersTableSeeder::class);
        $this->call(SeasonTableSeeder::class);
        $this->call(SeasonListTableSeeder::class);
        $this->call(ProductListTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);

        // $this->call(SeedTableSeeder::class);
    }
}
