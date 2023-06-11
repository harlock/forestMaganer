<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'workday_id',
        'application_mode_id',
        'date',
        'note',

    ];

    public function workday(){
        return $this->hasOne('App\Models\Workday','id','workday_id');
    }

    public function applicationmodee(){
        return $this->hasOne('App\Models\ApplicationMode','id','application_mode_id');
    }
}
