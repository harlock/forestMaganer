<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photograph extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'orchard_id',
        'type_photograph_id',
        'path',
        'date',
        'note',
    ];

    public function type_photo(){
        return $this->hasOne('App\Models\TypePhotograph','id','type_photograph_id');
    }
    public function orchard(){
        return $this->hasOne('App\Models\Orchard','id','orchard_id');
    }
}
