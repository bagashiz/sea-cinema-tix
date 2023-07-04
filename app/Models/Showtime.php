<?php

namespace App\Models;

use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Showtime extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => TimeCast::class,
        'end_time' => TimeCast::class,
    ];

    /**
     * Many to many relation to Date model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function date(): BelongsToMany
    {
        return $this->belongsToMany(Date::class)->using(DateShowtime::class);
    }
}
