<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallOfFameEntry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country', 'achievement', 'rank_position', 'featured'];

    protected $casts = ['featured' => 'boolean'];
}
