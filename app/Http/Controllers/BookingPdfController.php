<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingPdfController extends Controller
{
    public function download($code)
    {
        $booking = Booking::with(['service', 'barber'])
            ->where('booking_code', $code)
            ->firstOrFail();

        $pdf = Pdf::loadView('pdf.booking', compact('booking'));

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('booking-'.$booking->booking_code.'.pdf');
    }
}
