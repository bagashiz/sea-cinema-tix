<?php

namespace App\Enums;

/**
 * Enum for booking status.
 */
enum BookingStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';

    /**
     * Get booking status.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->value;
    }

    /**
     * Check if booking status is pending.
     *
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->value == self::PENDING;
    }

    /**
     * Check if booking status is paid.
     *
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->value == self::PAID;
    }

    /**
     * Check if booking status is cancelled.
     *
     * @return bool
     */
    public function isCancelled(): bool
    {
        return $this->value == self::CANCELLED;
    }
}
