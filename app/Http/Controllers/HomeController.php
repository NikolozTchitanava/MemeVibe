<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $randomPost = Post::inRandomOrder()->first();

        $data = [
            'title' => 'Welcome to Memeviibe',
            'message' => 'This is the initial home page of Memeviibe!',
            'randomPost' => $randomPost,
        ];

        return view('home', $data);
    }

    public function vote(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to vote'], 401);
        }

        $postId = $request->input('post_id');
        $voteType = $request->input('vote_type') === 'like'; // true for like, false for dislike

        // Check if user already voted on this post
        $existingVote = Vote::where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if ($existingVote) {
            // Update existing vote if different
            if ($existingVote->vote_type !== $voteType) {
                $existingVote->vote_type = $voteType;
                $existingVote->save();
            }
        } else {
            // Create new vote
            Vote::create([
                'user_id' => $user->id,
                'post_id' => $postId,
                'vote_type' => $voteType,
                'created_at' => now(),
            ]);
        }

        // Get a new random post (excluding the one just voted on)
        $newPost = Post::inRandomOrder()
            ->where('id', '!=', $postId)
            ->first();

        if (!$newPost) {
            return response()->json(['error' => 'No more memes available'], 404);
        }

        return response()->json([
            'image' => asset('storage/' . $newPost->image),
            'title' => $newPost->title,
            'post_id' => $newPost->id,
            'rating' => $newPost->rating,
        ]);
    }
}
