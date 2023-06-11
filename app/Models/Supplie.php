<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'name',
        'registry_number',
        'data_sheet',
        'safety_sheet',
        'unit_id',
        'product_category_id',
        'mark_supplie_id',
    ];

    public function product_categori()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'product_category_id');
    }
    public function unit()
    {
        return $this->hasOne('App\Models\Unit', 'id', 'unit_id');
    }
    public function mark_supplie()
    {
        return $this->hasOne('App\Models\MarkSupplie', 'id', 'mark_supplie_id');
    }
}
