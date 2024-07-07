<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'postal_code',
        'image',
    ];
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'bookings')
                    ->withPivot('start_date', 'end_date', 'total_price', 'status')
                    ->withTimestamps();
    }
    

}
