<?php

namespace Database\Seeders;

use App\Models\BodyStyle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodyStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BodyStyle::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Sedans'
            ],
            [
                'id' => 2,
                'name' => 'Buses'
            ],
            [
                'id' => 3,
                'name' => 'Trucs'
            ],
            [
                'id' => 4,
                'name' => 'Coupes'
            ],
            [
                'id' => 5,
                'name' => 'Wagons'
            ],
            [
                'id' => 6,
                'name' => 'Van & MiniVans'
            ],
            [
                'id' => 7,
                'name' => 'Hatchs'
            ],
            [
                'id' => 8,
                'name' => 'Mini Vehicles'
            ]
        ];

        DB::table('body_styles')->insert($data);
    }
}
