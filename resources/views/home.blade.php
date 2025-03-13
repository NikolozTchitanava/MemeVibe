<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        /* simple AI designed styling*/
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 18px;
        }
        .navbar a:hover {
            background-color: #555;
        }
        .logo-top-left {
            position: absolute;
            top: 10px;
            left: 10px;
            max-width: 100px;
        }
        .content {
            margin-top: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: calc(100vh - 60px);
        }
        .photo-frame {
            border: 2px solid #333;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
            background-color: #f9f9f9;
            width: 500px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .photo-frame img {
            max-width: 100%;
            max-height: 100%;
        }
        .buttons {
            margin: 10px 0;
        }
        .buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 24px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        .like-btn {
            background-color: #4CAF50;
            color: white;
        }
        .dislike-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<!-- Navigation Bar (Top) -->
<div class="navbar">
    <a href="{{ url('/') }}">Home</a>
</div>

<!-- Logo in Top Left Corner -->
<img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Memevibe Logo" class="logo-top-left">

<!-- Main Content -->
<div class="content">
    <!-- Photo Frame (Placeholder for now) -->
    <div class="photo-frame">
        <img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Placeholder Photo">
    </div>

    <!-- Like and Dislike Buttons with Emojis (AI told me it's possible)-->
    <div class="buttons">
        <button class="like-btn">👍</button>
        <button class="dislike-btn">👎</button>
    </div>
</div>
</body>
</html>
