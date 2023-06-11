<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhenophaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phenophases=[
            [
                'phenophase' => 'Crecimiento De Raíces',
                'description' => '',
            ],
            [
                'phenophase' => 'Brote Floral',
                'description' => '',
            ],
            [
                'phenophase' => 'Crecimieno Fruto ',
                'description' => '',
            ],
        ];
        DB::table('phenophases')->insert ($phenophases);

    }
}
