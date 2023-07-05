<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'date_movie_id',
        'date_showtime_id',
        'total_price',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_price' => 'integer',
        'status' => BookingStatus::class,
    ];

    /**
     * Many to one relation to DateShowtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dateShowtime(): BelongsTo
    {
        return $this->belongsTo(DateShowtime::class);
    }

    /**
     * Many to one relation to Movie model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * Many to one relation to User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
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
}
