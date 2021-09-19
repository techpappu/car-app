<?php

namespace Database\Seeders;

use App\Models\SafetyEquipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SafetyEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SafetyEquipment::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'ESC (Electronic Stability Control)'
            ],
            [
                'id' => 2,
                'name' => 'Collision Safety Body'
            ],
            [
                'id' => 3,
                'name' => 'Collision Damage Reduction System'
            ],
            [
                'id' => 4,
                'name' => 'Clearance Sonar'
            ],
            [
                'id' => 5,
                'name' => 'Automatic High Beam'
            ],
            [
                'id' => 6,
                'name' => 'Auto Light'
            ],
            [
                'id' => 7,
                'name' => 'Active Headrest'
            ]
        ];

        DB::table('safety_equipment')->insert($data);
    }
}
