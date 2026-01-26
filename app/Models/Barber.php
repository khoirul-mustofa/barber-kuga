<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $guarded = ['id'];

    // relasi satu barber bisa memiliki banyak booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
