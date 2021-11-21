<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'TOYOTA'
            ],
            [
                'id' => 2,
                'name' => 'LEXUS'
            ],
            [
                'id' => 3,
                'name' => 'NISSAN'
            ],
            [
                'id' => 4,
                'name' => 'HONDA'
            ],
            [
                'id' => 5,
                'name' => 'MAZDA'
            ],
            [
                'id' => 6,
                'name' => 'EUNOS'
            ],
            [
                'id' => 7,
                'name' => 'MCC SMART'
            ],
            [
                'id' => 8,
                'name' => 'BMW'
            ]
        ];

        DB::table('brands')->insert($data);
    }
}
