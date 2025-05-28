<?php

namespace Product\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'description',
    ];
}
