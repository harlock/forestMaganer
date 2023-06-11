<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
