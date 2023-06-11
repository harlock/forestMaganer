<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveElement extends Model
{
    use HasFactory;
    use SoftDeletes;
    //public $timestamps = false;
    protected $fillable = [

        'chemical_element_id',
        'supply_id',
        'percentage',

    ];

    public function chemical_elemen(){
        return $this->hasOne('App\Models\ChemicalElement','id','chemical_element_id');
    }

    public function suppli(){
        return $this->hasOne('App\Models\Supplie','id','supply_id');
    }
}
