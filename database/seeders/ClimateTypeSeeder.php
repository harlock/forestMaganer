<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClimateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $climate_types=[
            [
                'climate_type' => 'Calido',
                'description' => '',
            ],
            [
                'climate_type' => 'frio',
                'description' => '',
            ],
            [
                'climate_type' => 'Humedo',
                'description' => '',
            ],
            [
                'climate_type' => 'Templado',
                'description' => '',
            ],
            [
                'climate_type' => 'tropical',
                'description' => '',
            ],
            [
                'climate_type' => 'subtropical',
                'description' => '',
            ],
        ];
        DB::table('climate_types')->insert ($climate_types);
    }
}
