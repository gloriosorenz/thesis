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
            [
                'id' => 3, 
                'rice_farmers_id' => 3, 
                'seasons_id' => 1,
                'planned_hectares'=> 2.3,
                'actual_hectares'=> 2.1,
                'planned_num_farmers'=> 7,
                'actual_num_farmers'=> 5,
                'planned_qty'=> 70,
                'actual_qty'=> 68,
            ],
            [
                'id' => 4, 
                'rice_farmers_id' => 1, 
                'seasons_id' => 2,
                'planned_hectares'=> 10.4,
                'actual_hectares'=> 10.2,
                'planned_num_farmers'=> 12,
                'actual_num_farmers'=> 11,
                'planned_qty'=> 150,
                'actual_qty'=> 145,
            ],
            [
                'id' => 5, 
                'rice_farmers_id' => 2, 
                'seasons_id' => 2,
                'planned_hectares'=> 6.7,
                'actual_hectares'=> 6.2,
                'planned_num_farmers'=> 6,
                'actual_num_farmers'=> 6,
                'planned_qty'=> 120,
                'actual_qty'=> 115,
            ],
            [
                'id' => 6, 
                'rice_farmers_id' => 3, 
                'seasons_id' => 2,
                'planned_hectares'=> 25,
                'actual_hectares'=> 22,
                'planned_num_farmers'=> 20,
                'actual_num_farmers'=> 19,
                'planned_qty'=> 340,
                'actual_qty'=> 320,
            ],
            [
                'id' => 7, 
                'rice_farmers_id' => 1, 
                'seasons_id' => 3,
                'planned_hectares'=> 8.8,
                'actual_hectares'=> 8.4,
                'planned_num_farmers'=> 10,
                'actual_num_farmers'=> 12,
                'planned_qty'=> 130,
                'actual_qty'=> 125,
            ],
            [
                'id' => 8, 
                'rice_farmers_id' => 2, 
                'seasons_id' => 3,
                'planned_hectares'=> 8.5,
                'actual_hectares'=> 8.1,
                'planned_num_farmers'=> 10,
                'actual_num_farmers'=> 9,
                'planned_qty'=> 120,
                'actual_qty'=> 110,
            ],
            [
                'id' => 9, 
                'rice_farmers_id' => 3, 
                'seasons_id' => 3,
                'planned_hectares'=> 26,
                'actual_hectares'=> 24,
                'planned_num_farmers'=> 18,
                'actual_num_farmers'=> 17,
                'planned_qty'=> 350,
                'actual_qty'=> 300,
            ],
            [
                'id' => 10, 
                'rice_farmers_id' => 1, 
                'seasons_id' => 4,
                'planned_hectares'=> 8.9,
                'planned_num_farmers'=> 10,
                'planned_qty'=> 120,
            ],
            [
                'id' => 11, 
                'rice_farmers_id' => 2, 
                'seasons_id' => 4,
                'planned_hectares'=> 10.4,
                'planned_num_farmers'=> 15,
                'planned_qty'=> 140,
            ],
            [
                'id' => 12, 
                'rice_farmers_id' => 3, 
                'seasons_id' => 4,
                'planned_hectares'=> 19,
                'planned_num_farmers'=> 16,
                'planned_qty'=> 290,
            ],

        ];

        foreach ($items as $item) {
            \App\SeasonList::create($item);
        }
    }
}
