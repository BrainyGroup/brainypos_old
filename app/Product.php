<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'group',
        'brand',
        'type',
        'category',
        'description',
        'size',
        'package_unit',
        'unit',
        'package_quantity',
        'photo'
    ];

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }




}
