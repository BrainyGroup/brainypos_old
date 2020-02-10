<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'cost',
        'reorder_level',
        'current_amount',

    ];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
