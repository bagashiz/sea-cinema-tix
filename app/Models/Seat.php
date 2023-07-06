<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Seat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seat_number'
    ];

    /**
     * Many to many relation to Booking model.
     *
     * @return BelongsToMany
     */
    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booked_seats');
    }

    /**
     * Many to many relation to DateShowtime model.
     *
     * @return BelongsToMany
     */
    public function dateShowtimes(): BelongsToMany
    {
        return $this->belongsToMany(DateShowtime::class, 'booked_seats');
    }

    /**
     * Check if the seat is booked for a specific movie.
     *
     * @param Movie $movie
     * @param Date $date
     * @param Showtime $showtime
     * @return bool
     */
    public function isBooked(Movie $movie, Date $date, Showtime $showtime): bool
    {
        return DB::table('booked_seats')
            ->join('date_showtime', 'booked_seats.date_showtime_id', '=', 'date_showtime.id')
            ->join('bookings', 'booked_seats.booking_id', '=', 'bookings.id')
            ->where('date_showtime.date_id', $date->id)
            ->where('date_showtime.showtime_id', $showtime->id)
            ->where('booked_seats.seat_id', $this->id)
            ->where('bookings.movie_id', $movie->id)
            ->exists();
    }
}
