<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;


    protected $fillable = [
        'maker',
        'model',
        'year',
        'transmission',
        'fuel',
        'doors',
        'price',
        'mileage',
        'engine',
        'power',
        'seats',
        'description',
        'image',
        'booked'
    ];

}
