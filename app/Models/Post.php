<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
        'user_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Add relationship for votes
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'post_id');
    }

    // Calculate rating dynamically (likes - dislikes)
    public function getRatingAttribute()
    {
        $likes = $this->votes()->where('vote_type', true)->count();
        $dislikes = $this->votes()->where('vote_type', false)->count();
        return $likes - $dislikes;
    }
}
