<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Handle the image upload
        $imagePath = $request->file('image')->store('posts', 'public');

        // Create the post
        Post::create([
            'title' => $request->title,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
