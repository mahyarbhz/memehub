<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", "meme_id"
    ];

    public function meme(): BelongsTo
    {
        return $this->belongsTo(Meme::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
