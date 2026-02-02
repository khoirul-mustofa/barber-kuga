<?php

namespace App\Enums;

enum StatusBookingEnum: string
{
    case WAITING_PAYMENT = 'waiting_payment';
    case WAITING_VERIFICATION = 'waiting_verification';
    case CONFIRMED = 'confirmed';
    case REJECTED = 'rejected';
    case EXPIRED = 'expired';
    case COMPLETED = 'completed';

}
