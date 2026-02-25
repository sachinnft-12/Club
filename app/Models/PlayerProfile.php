<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'headline', 'bio', 'city', 'state', 'country', 'achievements', 'is_coach_too',
    ];

    protected $casts = [
        'is_coach_too' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
