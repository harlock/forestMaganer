<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Unit::factory(10)->create();
        $data = [
            [
                'description' =>    'Mililitros ml',
            ],
            [
                'description' =>    'Litros lts',
            ],
            [
                'description' =>    'Gramos g',
            ],
            [
                'description' =>    'Kilos kgs',
            ],
            [
                'description' =>    'Piezas pz',
            ],
        ];
        DB::table('units')->insert($data);
    }
}
