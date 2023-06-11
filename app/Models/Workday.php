<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workday extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'user_id',
        'orchard_id',
        'date_work',
        'general_expenses',
        'description',
    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function orchard(){
        return $this->hasOne('App\Models\Orchard','id','orchard_id');
    }
}
