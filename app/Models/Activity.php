<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'workday_id',
        'type_job_id',
        'cost',
        'status',
    ];

    public function workday(){
        return $this->hasOne('App\Models\Workday', 'id', 'workday_id');
    }
    public function typejob(){
        return $this->hasOne('App\Models\TypeJob','id','type_job_id');
    }
}
