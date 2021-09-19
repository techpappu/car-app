<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipment::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Driver Seat Airbag /Passenger Seat Airbag'
            ],
            [
                'id' => 2,
                'name' => 'Manual Sliding Door on Both Sides'
            ],
            [
                'id' => 3,
                'name' => 'Sun / Moon Roof'
            ],
            [
                'id' => 4,
                'name' => 'ABC'
            ],
            [
                'id' => 5,
                'name' => 'Air Conditioner'
            ],
            [
                'id' => 6,
                'name' => 'Double Air-conditioner'
            ],
            [
                'id' => 7,
                'name' => 'Lift Up'
            ],
            [
                'id' => 8,
                'name' => 'Downhill Assist Control'
            ],
            [
                'id' => 9,
                'name' => 'Power Steering'
            ],
            [
                'id' => 10,
                'name' => 'Power Window'
            ],
            [
                'id' => 11,
                'name' => 'Anti-theft Device'
            ],
            [
                'id' => 12,
                'name' => 'Idling Stop'
            ],
            [
                'id' => 13,
                'name' => 'Drive Recorder'
            ],
            [
                'id' => 14,
                'name' => 'USB Input Terminal'
            ],
            [
                'id' => 15,
                'name' => 'Bluetooth Connection'
            ],
            [
                'id' => 16,
                'name' => '100V Power Supply'
            ],
            [
                'id' => 17,
                'name' => 'Clean Diesel'
            ],
            [
                'id' => 18,
                'name' => 'Center Differential Lock'
            ],
            [
                'id' => 19,
                'name' => 'Electric Retractable Mirror'
            ]
        ];

        DB::table('equipment')->insert($data);
    }
}
