<?php

namespace App\Enums;

enum OrderStatus: string
{
    case AWAITING_PAYMENT = 'awaiting_payment';
    case PROCESSING = 'processing';
    case ACCOMPLISHED = 'accomplished';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';

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
            self::AWAITING_PAYMENT => __('Chờ thanh toán'),
            self::PROCESSING => __('Đang xử lý'),
            self::ACCOMPLISHED => __('Đã hoàn thành'),
            self::CANCELLED => __('Đã hủy'),
            self::REFUNDED => __('Đã hoàn lại tiền')
        };
    }
}