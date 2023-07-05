<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'age_rating' => 'integer',
        'ticket_price' => 'integer',
        'release_date' => 'date',
    ];

    /**
     * Many to many relation to Showtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dates(): BelongsToMany
    {
        return $this->belongsToMany(Date::class, 'date_movie');
    }

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
     * scopeFilter defines filter that used in query.
     *
     * @param Builder $query
     * @param string|null $title
     * @param string|null $sort
     *
     * @return void
     */
    public function scopeFilter(Builder $query, ?string $title, ?string $sort): void
    {
        if ($title ?? false) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($sort ?? false) {
            $sort = str_replace(' ', '_', $sort);

            if ($sort === 'release_date' || $sort === 'age_rating' || $sort === 'ticket_price') {
                $query->orderBy($sort);
            }
        }
    }
}
