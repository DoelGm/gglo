<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'description',
        'discount',
        'marca',
        'type',
        'brand',
        'status',
        'color',
        'quantity_in_stock',
        'price',


    ];
}
