<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // Disable automatic timestamps management (set to true if you want Eloquent to handle them)
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'image',     // Field to store the image or GIF path
        'user_id',
        'created_at',
    ];

    // Relationship with the User model.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
