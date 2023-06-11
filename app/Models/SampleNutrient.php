<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SampleNutrient extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'nutrient_analysi_id',
        'unit_id',
        'chemical_element_id',
        'percentage',
        'lot',

    ];
}
