<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Date extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Many to many relation to Showtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function showtimes(): BelongsToMany
    {
        return $this->belongsToMany(Showtime::class, 'date_showtime');
    }

    /**
     * Many to many relation to Movie model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'date_movie');
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
