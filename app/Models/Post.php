<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // Option 1: Enable timestamps and let Laravel manage created_at
    public $timestamps = true;

    // If you only want created_at (not updated_at), comment out the above and use:
    // protected $dates = ['created_at'];

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'image',
        'user_id',
        'created_at',
    ];

    // Relationship with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
