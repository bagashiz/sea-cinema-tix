<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'poster_url',
        'age_rating',
        'ticket_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_date' => 'date',
    ];

    /**
     * Many to many relation to Showtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function showtimes(): BelongsToMany
    {
        return $this->belongsToMany(Showtime::class, 'movie_showtime');
    }
}
