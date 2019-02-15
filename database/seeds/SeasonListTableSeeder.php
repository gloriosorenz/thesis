<?php

use Illuminate\Database\Seeder;

class SeasonListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            /* GUIDE
                $table->double('planned_hectares');
                $table->double('actual_hectares');
                $table->integer('planned_qty');
                $table->integer('actual_qty');
                $table->integer('planned_num_farmers');
                $table->integer('actual_num_farmers');
            */
            [
                'id' => 1, 
                'rice_farmers_id' => 1, 
                'seasons_id' => 1,
                'planned_hectares'=> 8.9,
                'actual_hectares'=> 8.5,
                'planned_num_farmers'=> 10,
                'actual_num_farmers'=> 10,
                'planned_qty'=> 100,
                'actual_qty'=> 100,
            ],
            [
                'id' => 2, 
                'rice_farmers_id' => 2, 
                'seasons_id' => 1,
                'planned_hectares'=> 10.4,
                'actual_hectares'=> 9.8,
                'planned_num_farmers'=> 15,
                'actual_num_farmers'=> 14,
                'planned_qty'=> 100,
                'actual_qty'=> 100,
            ],

        ];

        foreach ($items as $item) {
            \App\SeasonList::create($item);
        }
    }
}
