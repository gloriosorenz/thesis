<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\User::class, function (Faker $faker) {
    $barangays = App\Barangay::pluck('id')->toArray();
    $roles = App\Barangay::pluck('id')->toArray();
    $provinces = App\Barangay::pluck('id')->toArray();
    $cities = App\Barangay::pluck('id')->toArray();

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'street' => $faker->secondaryAddress,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'roles_id' => 3,
        'barangays_id' => 282,
        'provinces_id' => 19,
        'cities_id' => 19,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\OrderProduct::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
        'order_product_statuses_id' => $faker->numberBetween($min = 1, $max = 4),
        'product_lists_id' => $faker->numberBetween($min = 1, $max = 9),
        'orders_id' => $faker->numberBetween($min = 1, $max = 9)
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'order_statuses_id' => 1,
        'total_price' => $faker->numberBetween($min = 16, $max = 3500),
        'users_id' => $faker->unique(true)->numberBetween($min = 10, $max = 19),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
    ];
});
