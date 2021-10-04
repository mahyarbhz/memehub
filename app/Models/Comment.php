<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;

class Comment extends Model
{
    use HasFactory;
    use HumanTimestamps;

    protected $fillable = [
        'comment',
        'user_id',
        'meme_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function meme() {
        return $this->belongsTo(Meme::class);
    }
}
