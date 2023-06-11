<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnualProduction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'orchard_id',
        'ton_harvest',
        'date_production',
        'sale',
        'damage_percentage',

    ];

    public function orchard(){
        return $this->hasOne('App\Models\Orchard','id','orchard_id');
    }
}
