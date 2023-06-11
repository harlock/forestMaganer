<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChemicalElement;
use Illuminate\Support\Facades\DB;

class ChemicalElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ChemicalElement::factory(10)->create();
        $data = [
            [
                'name' =>    'Nitrogeno',
                'chemical_code' =>  'N',
            ],
            [
                'name' =>    'Fosforo',
                'chemical_code' =>  'P2O5',
            ],
            [
                'name' =>    'POTASIO',
                'chemical_code' =>  'K2O',
            ],
            [
                'name' =>    'CALCIO',
                'chemical_code' =>  'CA',
            ],
            [
                'name' =>    'MAGNESIO',
                'chemical_code' =>  'Mg',
            ],
            [
                'name' =>    'SODIO',
                'chemical_code' =>  'Na',
            ],
            [
                'name' =>    'CLORURO',
                'chemical_code' =>  'CI',
            ],
            [
                'name' =>    'HIERRO',
                'chemical_code' =>  'Fe',
            ],
            [
                'name' =>    'COBRE',
                'chemical_code' =>  'Cu',
            ],
            [
                'name' =>    'MANGANESO',
                'chemical_code' =>  'Mn',
            ],
            [
                'name' =>    'ZINC',
                'chemical_code' =>  'Zn',
            ],
            [
                'name' =>    'BORO',
                'chemical_code' =>  'B',
            ],
        ];
        DB::table('chemical_elements')->insert($data);
    }
}
