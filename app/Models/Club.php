<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'display_name', 'public_slug', 'description', 'city', 'state', 'country',
        'address', 'latitude', 'longitude', 'open_time', 'close_time', 'phone', 'email', 'website', 'status',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tournaments(): HasMany
    {
        return $this->hasMany(Tournament::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
