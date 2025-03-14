<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="{{ asset('css/create-post.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
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

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
</body>
</html>
