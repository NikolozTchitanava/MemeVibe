<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
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

<!-- Create Post Form -->
<div class="create-post-container">
    <h1>Create New Post</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="{{ old('title') }}"
                   required>
        </div>

        <div class="form-group">
            <label for="image">Upload Image/GIF</label>
            <input type="file"
                   class="form-control"
                   id="image"
                   name="image"
                   accept="image/jpeg,image/png,image/gif"
                   required>
            <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF (Max 2MB)</small>
        </div>

        <button type="submit" class="btn-primary">Create Post</button>
    </form>
</div>
</body>
</html>
