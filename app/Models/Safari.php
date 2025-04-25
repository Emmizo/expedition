<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Safari extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'name',
        'slug',
        'description',
        'image_path',
    ];

    /**
     * Get the destination that owns the safari.
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
}
