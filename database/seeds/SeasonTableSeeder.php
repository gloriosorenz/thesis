<?php

use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            // 1 = wet , 2 = dry
            [
                'id' => 1, 
                'season_types_id' => 1, //dry
                'season_statuses_id' => 2,
                'season_start'=> '2017-07-24', 
                'season_end'=> '2017-10-01',
            ],
            [
                'id' => 2, 
                'season_types_id' => 2, //dry
                'season_statuses_id' => 2,
                'season_start'=> '2017-11-01',
                'season_end'=> '2018-02-18',
            ],
            [
                'id' => 3, 
                'season_types_id' => 2, //wet
                'season_statuses_id' => 2,
                'season_start'=> '2018-03-12',
                'season_end'=> '2018-06-28',
            ],
            [
                'id' => 4, 
                'season_types_id' => 1, //wet
                'season_statuses_id' => 2,
                'season_start'=> '2018-07-18',
                'season_end'=> '2018-10-20',

            ],
            [
                'id' => 5, 
                'season_types_id' => 1, //dry
                'season_statuses_id' => 2,
                'season_start'=> '2018-12-10', 
                'season_end'=> '2019-03-26',
            ],
            // [
            //     'id' => 6, 
            //     'season_types_id' => 2, //wet
            //     'season_statuses_id' => 1,
            //     'season_start'=> '2019-03-16', 
            // ],

        ];

        //TYPE 1 = March 16 -> Sept. 15 (March, April, May, June, July, August, September)
        //TYPE 2 Sept. 16 -> March 15 (September, October, November, December, January, February, March)

        foreach ($items as $item) {
            \App\Season::create($item);
        }
    }
}
