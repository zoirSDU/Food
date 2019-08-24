<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $dates = [
        'cooking_date',

    ];

    protected $fillable = [
        'product_id',
        'product_type_id',
        'status',
        'cooking_date',
        'delivery_itself',
        'free_delivery_radius',
        'free_delivery_amount',
    ];
}
