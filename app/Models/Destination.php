<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    // Add fillable properties if you haven't already
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'is_popular',
    ];

    /**
     * Get the safaris for the destination.
     */
    public function safaris(): HasMany
    {
        return $this->hasMany(Safari::class);
    }

    /**
     * Get the blog posts for the destination.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
