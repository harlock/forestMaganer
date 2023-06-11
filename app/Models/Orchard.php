<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orchard extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'type_avocado_id',
        'type_topography_id',
        'type_soil_id',
        'climate_type_id',
        'user_id',
        'name_orchard',
        'path_image',
        'location_orchard',
        //'point',
        //'area',
        'altitude',
        'surface',
        'state',
        'creation_year',
        'planting_density',
        'irrigation',

    ];

    public function type_avo(){
        return $this->hasOne('App\Models\TypeAvocado','id','type_avocado_id');
    }

    public function type_topo(){
        return $this->hasOne('App\Models\TypeTopography','id','type_topography_id');
    }
    public function type_soi(){
        return $this->hasOne('App\Models\TypeSoil','id','type_soil_id');
    }
    public function climate_typ(){
        return $this->hasOne('App\Models\ClimateType','id','climate_type_id');
    }
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
