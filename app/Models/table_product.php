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
        'descuento',
        'marca',
        'price',


    ];
}
