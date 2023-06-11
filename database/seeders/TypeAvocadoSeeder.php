<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAvocadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_avocados=[
            [
                'type_avocado' => 'Hass',
                'description' => ''
            ],
            [
                'type_avocado' => 'Criollo',
                'description' => ''
            ],
            [
                'type_avocado' => 'Bacón',
                'description' => ''
            ],
            [
                'type_avocado' => 'Pinkerton',
                'description' => ''
            ],
            [
                'type_avocado' => 'Gwen',
                'description' => ''
            ],
            [
                'type_avocado' => 'Reed',
                'description' => ''
            ],
        ];
        DB::table('type_avocados')->insert ($type_avocados);
    }
}
