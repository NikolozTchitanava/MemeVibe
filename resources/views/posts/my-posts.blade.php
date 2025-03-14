<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/my-posts.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navigation Bar from home.blade.html -->
<div class="navbar">
    <a href="{{ url('/') }}"><img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Memevibe Logo"></a>

    <div class="nav-center">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('posts.create') }}">Create Meme</a>
        <a href="{{ route('posts.my') }}">View my posts</a>
    </div>

    <div class="auth">
        @auth
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ url('/login') }}">Sign In</a>
            <a href="{{ url('/signup') }}">Sign Up</a>
        @endauth
    </div>
</div>

<!-- Posts Content -->
<div class="posts-container">
    <h1>My Posts</h1>

    @if ($posts->isEmpty())
        <p>You haven't created any posts yet.</p>
    @else
        <div class="posts-list">
            @foreach ($posts as $post)
                <div class="post-item">
                    <h2>{{ $post->title }}</h2>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-img">
                    <p>Posted on: {{ $post->created_at->format('M d, Y') }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn-primary">Create New Post</a>
</div>
</body>
</html>
