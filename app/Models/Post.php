<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // Relationship with the User model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
