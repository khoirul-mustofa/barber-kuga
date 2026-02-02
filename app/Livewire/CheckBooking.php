<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CheckBooking extends Component
{
    public $booking_code;

    public $phone;

    public $booking;

    public $notFound = false;

    protected $rules = [
        'booking_code' => 'required|string',
        'phone' => 'required|numeric',
    ];

    public function check()
    {
        $this->validate();

        $this->booking = Booking::where('booking_code', $this->booking_code)
            ->where('phone', $this->phone)
            ->with(['service', 'barber'])
            ->first();

        if (! $this->booking) {
            $this->notFound = true;
        } else {
            $this->notFound = false;
        }
    }

    #[Layout('kuga.layouts.app')]
    public function render()
    {
        return view('livewire.check-booking');
    }
}
