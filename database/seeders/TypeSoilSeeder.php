<?php

namespace Database\Seeders;

use App\Models\TypeSoil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSoilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_soils=[
            [
                'type_soil' => 'Arcilloso',
                'description' => '',
            ],
            [
                'type_soil' => 'Limosa',
                'description' => '',
            ],
            [
                'type_soil' => 'Arenoso',
                'description' => '',
            ],
            [
                'type_soil' => 'Luvisoles',
                'description' => '',
            ],
            [
                'type_soil' => 'Nitisoles',
                'description' => '',
            ],
            [
                'type_soil' => 'Calcisoles',
                'description' => '',
            ],
        ];
        DB::table('type_soils')->insert ($type_soils);
    }
}
