<?php

namespace Database\Seeders;

use App\Models\CarCondition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarCondition::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Non-smoking Car'
            ],
            [
                'id' => 2,
                'name' => 'One Owner'
            ],
            [
                'id' => 3,
                'name' => 'Maintenance Record Available'
            ]
        ];

        DB::table('car_conditions')->insert($data);
    }
}
