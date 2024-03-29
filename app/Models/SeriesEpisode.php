<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesEpisode extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'links' => 'array'
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function($movie) {
            return $movie->user_id = auth()->user()->id ?? 1;
        });
    }

    /**
     * One of this episode belongs to one series model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function series():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}
