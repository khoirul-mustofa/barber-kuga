<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    // relasi dengan booking, satu layanan bisa memiliki banyak booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
