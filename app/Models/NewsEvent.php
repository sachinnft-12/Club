<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category', 'summary', 'content', 'published_at', 'is_active'];

    protected $casts = ['published_at' => 'datetime', 'is_active' => 'boolean'];
}
