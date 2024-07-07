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

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()
                    ->withPivot('start_date', 'end_date', 'total_price', 'status')
                    ->withTimestamps();
    }



}
