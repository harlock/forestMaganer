<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application_modes = [
            [
                'description' =>    'Aplicacion Radicular o al suelo',
            ],
            [
                'description' =>   'Aplicacion localizada',
            ],
            [
                'description' =>    'Aplicacion a voleo',
            ],
            [
                'description' =>    'Aplicacion foliar',
            ],
            [
                'description' =>    'Aplicacion por fertirriego',
            ]
        ];
        DB::table('application_modes')->insert($application_modes);

        $chemical_elements = [
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
        DB::table('chemical_elements')->insert($chemical_elements);

        $type_photographs = [
            [
                'type_photograph' =>    'Huerto',
                'description' =>    '',
            ],
            [
                'type_photograph' =>    'Aguacate',
                'description' =>    '',
            ],
            [
                'type_photograph' =>    'Follaje',
                'description' =>    '',
            ],
        ];
        DB::table('type_photographs')->insert($type_photographs);

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

        $phenophases=[
            [
                'phenophase' => 'Crecimiento De Raíces',
                'description' => 'Las raíces se adaptan al suelo despues de su transplante',
            ],
            [
                'phenophase' => 'Crecimiento Vejetativo',
                'description' => 'La planta se encuentra en estado de crecimiento',
            ],
            [
                'phenophase' => 'Brote Floral',
                'description' => 'Las flores que sobre salen llegan a la fase de amarre y cuaje',
            ],
            [
                'phenophase' => 'Crecimieno Fruto',
                'description' => 'El fruto se ecnuentra en estado de crecimiento desde que sale el pupilo a un aguacate tamaño normal',
            ],
            [
                'phenophase' => 'Fructificacion',
                'description' => 'El fruto entra en el estado de maduración',
            ],
        ];
        DB::table('phenophases')->insert ($phenophases);

        $product_categories = [
            [
                'description' =>    'Regulador de Crecimiento',
            ],
            [
                'description' =>   'Insecticidas',
            ],
            [
                'description' =>    'Fungicidas',
            ],
            [
                'description' =>    'Herbicidas',
            ],
            [
                'description' =>    'Bioestimulante/Fertilizante Foliar',
            ],

        ];
        DB::table('product_categories')->insert($product_categories);

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

        $type_jobs = [
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
        DB::table('type_jobs')->insert($type_jobs);

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

        $units = [
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
        DB::table('units')->insert($units);

        $marks_supplie=[
            [
                'description' => 'Syngenta'
            ],
            [
                'description' => 'Yara'
            ],
            [
                'description' => 'AgroScience'
            ],
        ];
        DB::table('mark_supplies')->insert($marks_supplie);

        $supplie=[
            [
                'name' => 'Magtrac',
                'registry_number' => '1',
                'data_sheet' => 'supplies_data_sheet/MAGTRAC.pdf',
                'unit_id' => '2',
                'safety_sheet' => 'supplies_safety_sheet/MAGTRAC.pdf',
                'product_category_id' => '5',
                'mark_supplie_id' => '2',
            ],
            [
                'name' => 'Bortrac',
                'registry_number' => '2',
                'data_sheet' => 'supplies_data_sheet/bortrac.pdf',
                'unit_id' => '3',
                'safety_sheet' => 'supplies_safety_sheet/bortrac.pdf',
                'product_category_id' => '5',
                'mark_supplie_id' => '2',
            ],
            [
                'name' => 'Stopit',
                'registry_number' => '3',
                'data_sheet' => 'supplies_data_sheet/stopit_front.pdf',
                'unit_id' => '2',
                'safety_sheet' => 'supplies_safety_sheet/stopit_front.pdf',
                'product_category_id' => '5',
                'mark_supplie_id' => '2',
            ],
            [
                'name' => 'crop boost',
                'registry_number' => '4',
                'data_sheet' => 'supplies_data_sheet/crop_boost.pdf',
                'unit_id' => '1',
                'safety_sheet' => 'supplies_safety_sheet/crop_boost.pdf',
                'product_category_id' => '5',
                'mark_supplie_id' => '2',
            ],
        ];
        DB::table('supplies')->insert($supplie);
    }
}
