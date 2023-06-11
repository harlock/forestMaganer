<?php

namespace Database\Seeders;

use App\Models\TypeJob;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type_job' =>    'Podar',
                'description' =>    'Despuntar la planta para que ramifique y no crezca en una sola direccion',
                'type' => 'sin_suplemento'
            ],
            [
                'type_job' =>    'Riego',
                'description' =>    'Regar cantidad de agua suficiente para su frezcura',
                'type' => 'sin_suplemento'
            ],
            [
                'type_job' =>    'Cosechar',
                'description' =>    'Cortar los agucates maduros de los arboles',
                'type' => 'sin_suplemento'
            ],
            [
                'type_job' =>    'Empaquetadar',
                'description' =>    'Empaquetar los aguacates para su exportacion',
                'type' => 'sin_suplemento'
            ],
            [
                'type_job' =>    'Fumigar',
                'description' =>    'Aplica insectisida al huerto',
                'type' => 'suplemento'
            ],
            [
                'type_job' =>    'Abonar',
                'description' =>   'Abonar suplementos por encima de la superficie de la planta',
                'type' => 'suplemento'
            ],
        ];
        DB::table('type_jobs')->insert($data);
    }
}
