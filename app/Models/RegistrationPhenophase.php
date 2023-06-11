<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationPhenophase extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'phenophase_id',
        'orchard_id',
        'date',
        'comments',

    ];

    public function phenophase(){
        return $this->hasOne('App\Models\Phenophase','id','phenophase_id');
    }
    public function  orchard(){
        return $this->hasOne('App\Models\Orchard','id','orchard_id');
    }
}
