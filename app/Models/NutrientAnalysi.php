<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NutrientAnalysi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'orchard_id',
        'date_sample',
        'path',

    ];
}
