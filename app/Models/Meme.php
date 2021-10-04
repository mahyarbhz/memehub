<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;

class Meme extends Model
{
    use HasFactory;
    use HumanTimestamps;

    protected $fillable = [
        'description',
        'user_id',
        'category_id',
        'photo',
        'credit',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
