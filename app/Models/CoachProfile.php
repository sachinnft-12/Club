<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoachProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'public_slug', 'headline', 'bio', 'city', 'state', 'country', 'achievements', 'is_academy',
    ];

    protected $casts = [
        'is_academy' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
