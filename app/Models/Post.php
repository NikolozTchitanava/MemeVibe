<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // Disable automatic timestamps
    public $timestamps = false;

    // The attributes that are mass assignable
    protected $fillable = [
        'title',
        'image',
        'user_id',
        'created_at', // Include created_at since you'll manage it manually
    ];

    // Relationship with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
