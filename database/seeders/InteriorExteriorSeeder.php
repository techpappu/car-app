<?php

namespace Database\Seeders;

use App\Models\InteriorExterior;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteriorExteriorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InteriorExterior::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'TV & Navigation /Memory Navi etc.'
            ],
            [
                'id' => 2,
                'name' => 'TV (full segment)'
            ],
            [
                'id' => 3,
                'name' => 'Music Player Connectable /CD or CD Changer /Music Server'
            ],
            [
                'id' => 4,
                'name' => 'DVD Playback'
            ],
            [
                'id' => 5,
                'name' => 'Alloy Wheel'
            ],
            [
                'id' => 6,
                'name' => 'Leather Seat'
            ],
            [
                'id' => 7,
                'name' => 'Half Leather Seat'
            ],
            [
                'id' => 8,
                'name' => 'Keyless'
            ],
            [
                'id' => 9,
                'name' => 'LED Headlamp'
            ],
            [
                'id' => 10,
                'name' => 'HID (xenon light)'
            ],
            [
                'id' => 11,
                'name' => 'Back Camera'
            ],
            [
                'id' => 12,
                'name' => 'ETC'
            ],
            [
                'id' => 13,
                'name' => 'Aero'
            ],
            [
                'id' => 14,
                'name' => 'Smart Key'
            ],
            [
                'id' => 15,
                'name' => 'Lowdown'
            ],
            [
                'id' => 16,
                'name' => 'Run Flat Tire'
            ],
            [
                'id' => 17,
                'name' => 'Power Seats'
            ],
            [
                'id' => 18,
                'name' => '3-row Seat'
            ],
            [
                'id' => 19,
                'name' => 'Bench Seat'
            ],
            [
                'id' => 20,
                'name' => 'Full Flat Sheet'
            ],
            [
                'id' => 21,
                'name' => 'Tip Up Seat'
            ],
            [
                'id' => 22,
                'name' => 'Ottoman'
            ],
            [
                'id' => 23,
                'name' => 'Electric Retractable Third Seat'
            ],
            [
                'id' => 24,
                'name' => 'Seat Heater'
            ],
            [
                'id' => 25,
                'name' => 'Walk Through'
            ],
            [
                'id' => 26,
                'name' => 'Electric Rear Gate'
            ],
            [
                'id' => 27,
                'name' => 'Front Camera'
            ],
            [
                'id' => 28,
                'name' => 'Seat Air Conditioner'
            ],
            [
                'id' => 29,
                'name' => 'All-around Camera'
            ],
            [
                'id' => 30,
                'name' => 'Side Camera'
            ],
            [
                'id' => 31,
                'name' => 'Roof Rail'
            ],
            [
                'id' => 32,
                'name' => 'Air Suspension'
            ],
            [
                'id' => 33,
                'name' => 'Headlight Washer'
            ]
        ];

        DB::table('interior_exteriors')->insert($data);
    }
}
