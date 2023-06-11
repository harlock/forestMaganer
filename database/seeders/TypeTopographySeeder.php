<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeTopography;
use Illuminate\Support\Facades\DB;

class TypeTopographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TypeTopography::factory(10)->create();
        $type_topography=[
            [
                'type_topography' => 'Llano',
                'description' => 'Cuando las pendientes son nulas o menores del 2%',
            ],
            [
                'type_topography' => 'Ondulado',
                'description' => 'Cuando la pendiente es 2-8% y se alternan pequeñas colinas',
            ],
            [
                'type_topography' => 'Fuertemente Ondulado',
                'description' => 'Cuando la pendiente es 8-16% y se alternan colinas y pequeños cerros',
            ],
            [
                'type_topography' => 'Colinado',
                'description' => 'Cuando la pendiente es 16-30%, son superficies no erosionadas',
            ],
            [
                'type_topography' => 'Montañoso',
                'description' => 'Cuando la pendiente es mayor de 30%, hay diferencia de altitud desde los valles a las cumbres',
            ],
        ];
        DB::table('type_topographies')->insert ($type_topography);
    }
}
