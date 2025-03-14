<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import the Post model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch a random post from the database
        $randomPost = Post::inRandomOrder()->first();

        $data = [
            'title' => 'Welcome to Memeviibe',
            'message' => 'This is the initial home page of Memeviibe!',
            'randomPost' => $randomPost, // Pass the random post to the view
        ];

        return view('home', $data);
    }
}
