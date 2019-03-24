<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        
        public function run()
        {
            if (! DB::table('orders')->count()) {
                DB::unprepared(file_get_contents(__DIR__ . '/sql/orders.sql'));
            }
            // $items = [
                
            //     [
            //         'id' => 1, 
            //         'tracking_id' => 816590, 
            //         'order_statuses_id' => 2,
            //         'total_price' => 430,
            //         'users_id' => 4,
            //     ],
            //     [
            //         'id' => 2, 
            //         'tracking_id' => 193502, 
            //         'order_statuses_id' => 2,
            //         'total_price' => 716,
            //         'users_id' => 3,
            //     ],
            //     [
            //         'id' => 3, 
            //         'tracking_id' => 907638, 
            //         'order_statuses_id' => 2,
            //         'total_price' => 622,
            //         'users_id' => 7,
            //     ],
            //     [
            //         'id' => 4, 
            //         'tracking_id' => 714629, 
            //         'order_statuses_id' => 1,
            //         'total_price' => 427,
            //         'users_id' => 7,
            //     ],
    
            // ];
    
            // foreach ($items as $item) {
            //     \App\Order::create($item);
            // }
        }
    }
    
