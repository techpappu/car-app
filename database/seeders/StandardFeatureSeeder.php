<?php

namespace Database\Seeders;

use App\Models\StandardFeature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandardFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StandardFeature::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Seating Capacity 2'
            ],
            [
                'id' => 2,
                'name' => 'Supercharger'
            ],
            [
                'id' => 3,
                'name' => 'Cold Weather Specification Car'
            ],
            [
                'id' => 4,
                'name' => 'Welfare Vehicles'
            ]
        ];

        DB::table('standard_features')->insert($data);
    }
}
