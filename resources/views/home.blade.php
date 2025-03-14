<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navigation Bar -->
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

<!-- Main Content -->
<div class="content">
    <div class="meme-container">
        @if ($randomPost)
            <img src="{{ asset('storage/' . $randomPost->image) }}" alt="{{ $randomPost->title }}" class="meme-img">
        @else
            <p>No memes available yet.</p>
        @endif
        <div class="buttons">
            <button class="dislike-btn"><i class="fas fa-times"></i></button>
            <button class="like-btn"><i class="fas fa-heart"></i></button>
        </div>
    </div>
</div>
</body>
</html>
