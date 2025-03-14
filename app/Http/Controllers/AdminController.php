<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display the admin panel with all posts.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Fetch all posts with their associated users
        $posts = Post::with('user')->get();
        $totalPosts = $posts->count();

        return view('admin.index', compact('posts', 'totalPosts'));
    }

    /**
     * Delete a specific post.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        try {
            $post->delete();
            return redirect()->route('admin.index')->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Post deletion failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete the post.']);
        }
    }
}
