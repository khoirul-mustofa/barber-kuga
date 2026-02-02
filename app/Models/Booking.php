<?php

namespace App\Models;

use App\Enums\PaymentMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'name',
        'phone',
        'service_id',
        'barber_id',
        'booking_date',
        'booking_time',
        'status',
        'notes',
        'payment_method',
        'payment_proof',
        'dp_amount',
        'total_price',
        'verified_at',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime:H:i',
        'verified_at' => 'datetime',
        'payment_method' => PaymentMethods::class,
    ];

    /**
     * 🔗 RELATIONSHIPS
     */

    // Booking -> Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Booking -> Barber
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    /**
     * 🧠 STATUS HELPERS
     */
    public function isWaitingPayment(): bool
    {
        return $this->status === 'waiting_payment';
    }

    public function isWaitingVerification(): bool
    {
        return $this->status === 'waiting_verification';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * 🔐 BUSINESS RULE METHODS
     */

    // Kunci slot hanya jika booking CONFIRMED
    public function lockSlot(): bool
    {
        return $this->isConfirmed();
    }
}
