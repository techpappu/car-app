<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::truncate();
        $data = [
            [
                'id' => 1,
                'name' => 'Red'
            ],
            [
                'id' => 2,
                'name' => 'Black'
            ],
            [
                'id' => 3,
                'name' => 'Blue'
            ],
            [
                'id' => 4,
                'name' => 'White'
            ],
            [
                'id' => 5,
                'name' => 'Pink'
            ]
        ];

        DB::table('colors')->insert($data);
    }
}
