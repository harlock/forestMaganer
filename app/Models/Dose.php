<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dose extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'application_id',
        'supplie_id',
        'dose',

    ];

    public function application(){
        return $this->hasOne('App\Models\Application','id','application_id');
    }
    public function supplie(){
        return $this->hasOne('App\Models\Supplie','id','supplie_id');
    }

}
