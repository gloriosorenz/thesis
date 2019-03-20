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
            
            [
                'id' => 1, 
                'season_types_id' => 1,
                'season_statuses_id' => 2,
                'season_start'=> '2018-09-23',
                'season_end'=> '2018-12-25',
            ],
            [
                'id' => 2, 
                'season_types_id' => 2,
                'season_statuses_id' => 2,
                'season_start'=> '2019-01-15',
                'season_end'=> '2019-03-27',
            ],
            [
                'id' => 3, 
                'season_types_id' => 2,
                'season_statuses_id' => 2,
                'season_start'=> '2019-04-29',
                'season_end'=> '2019-08-12',
            ],
            [
                'id' => 4, 
                'season_types_id' => 1,
                'season_statuses_id' => 1,
                'season_start'=> '2019-10-17',
                // 'season_end'=> '2018-12-25',

            ],
            // [
            //     'id' => 5, 
            //     'season_types_id' => 1,
            //     'season_statuses_id' => 2,
            //     'season_start'=> '2018-09-23',
            //     'season_end'=> '2018-12-25',
            // ],
            // [
            //     'id' => 6, 
            //     'season_types_id' => 2,
            //     'season_statuses_id' => 2,
            //     'season_start'=> '2019-01-15',
            //     'season_end'=> '2019-03-27',
            // ],
            // [
            //     'id' => 7, 
            //     'season_types_id' => 2,
            //     'season_statuses_id' => 2,
            //     'season_start'=> '2019-04-29',
            //     'season_end'=> '2019-08-12',
            // ],
            // [
            //     'id' => 8, 
            //     'season_types_id' => 1,
            //     'season_statuses_id' => 1,
            //     'season_start'=> '2019-10-17',
            // ],

        ];

        //TYPE 1 = March 16 -> Sept. 15 (March, April, May, June, July, August, September)
        //TYPE 2 Sept. 16 -> March 15 (September, October, November, December, January, February, March)

        foreach ($items as $item) {
            \App\Season::create($item);
        }
    }
}
