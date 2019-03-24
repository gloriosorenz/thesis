<?php

use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            if (! DB::table('order_products')->count()) {
                DB::unprepared(file_get_contents(__DIR__ . '/sql/orderproducts.sql'));
            }
        // $items = [
            
        //     [
        //         'id' => 1, 
        //         'quantity' => 10, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 10,
        //         'orders_id' => 1,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 2, 
        //         'quantity' => 10, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 11,
        //         'orders_id' => 1,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 3, 
        //         'quantity' => 10, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 13,
        //         'orders_id' => 1,
        //         'farmers_id' => 4,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 4, 
        //         'quantity' => 20, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 16,
        //         'orders_id' => 2,
        //         'farmers_id' => 9,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 5, 
        //         'quantity' => 8, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 12,
        //         'orders_id' => 2,
        //         'farmers_id' => 9,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 6, 
        //         'quantity' => 8, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 13,
        //         'orders_id' => 2,
        //         'farmers_id' => 4,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 7, 
        //         'quantity' => 5, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 10,
        //         'orders_id' => 2,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 8, 
        //         'quantity' => 8, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 16,
        //         'orders_id' => 3,
        //         'farmers_id' => 9,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 9, 
        //         'quantity' => 12, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 10,
        //         'orders_id' => 3,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 10, 
        //         'quantity' => 10, 
        //         'order_product_statuses_id' => 1,
        //         'product_lists_id' => 11,
        //         'orders_id' => 3,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 11, 
        //         'quantity' => 12, 
        //         'order_product_statuses_id' => 3,
        //         'product_lists_id' => 17,
        //         'orders_id' => 3,
        //         'farmers_id' => 9,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 12, 
        //         'quantity' => 2, 
        //         'order_product_statuses_id' => 1,
        //         'product_lists_id' => 10,
        //         'orders_id' => 4,
        //         'farmers_id' => 2,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 13, 
        //         'quantity' => 10, 
        //         'order_product_statuses_id' => 1,
        //         'product_lists_id' => 14,
        //         'orders_id' => 4,
        //         'farmers_id' => 4,
        //         'created_at' => '2019-03-23'
        //     ],
        //     [
        //         'id' => 14, 
        //         'quantity' => 15, 
        //         'order_product_statuses_id' => 1,
        //         'product_lists_id' => 16,
        //         'orders_id' => 4,
        //         'farmers_id' => 9,
        //         'created_at' => '2019-03-23'
        //     ],

        // ];

        // foreach ($items as $item) {
        //     \App\OrderProduct::create($item);
        // }
    }
}
