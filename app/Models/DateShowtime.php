<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DateShowtime extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'date_showtime';

    /**
     * One to many relation to Booking model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Many to many relation to Seat model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class, 'booked_seats');
    }

    /**
     * Many to one relation to Date model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function date(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Date::class);
    }

    /**
     * Many to one relation to Showtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function showtime(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }
}
