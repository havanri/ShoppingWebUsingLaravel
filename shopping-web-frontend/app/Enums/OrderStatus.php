<?php

namespace App\Enums;

enum OrderStatus: string
{
    case AWAITING_PAYMENT = 'awaiting_payment';
    case PROCESSING = 'processing';

    public function color(): string
    {
        return match ($this) {
            self::AWAITING_PAYMENT => '#FBBF24',
            self::PROCESSING => '#38BDF8',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::AWAITING_PAYMENT => __('Awaiting Payment'),
            self::PROCESSING => __('Processing'),
        };
    }
}