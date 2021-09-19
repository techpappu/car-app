<?php

namespace Database\Seeders;

use App\Models\SelfDriving;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SelfDrivingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelfDriving::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Auto Cruise Control'
            ],
            [
                'id' => 2,
                'name' => 'Lane Keep Assist'
            ],
            [
                'id' => 3,
                'name' => 'Automatic Parking System'
            ],
            [
                'id' => 4,
                'name' => 'Park Assist'
            ]
        ];

        DB::table('self_drivings')->insert($data);
    }
}
