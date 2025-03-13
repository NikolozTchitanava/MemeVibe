<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* simple AI designed styling*/
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light background for contrast */
        }
        .navbar {
            background-color: #333;
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex; /* Added to align logo and links */
            align-items: center; /* Center items vertically */
        }
        .navbar img {
            max-height: 40px; /* Adjust logo size in navbar */
            margin-right: 20px; /* Space between logo and links */
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
            /* Removed since logo is now in the navbar */
        }
        .content {
            margin-top: 80px; /* More space for the navbar with logo */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: calc(100vh - 80px);
            padding: 20px 0; /* Add padding to center content */
        }
        .photo-frame {
            border: 2px solid #333;
            padding: 30px; /* Increased padding */
            margin: 50px 0; /* Lower the frame with more vertical spacing */
            text-align: center;
            background-color: #ffffff; /* Changed to white for better contrast */
            width: 600px; /* Bigger frame */
            height: 400px; /* Bigger frame */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added shadow for depth */
        }
        .photo-frame img {
            max-width: 100%;
            max-height: 100%;
        }
        .buttons {
            margin: 20px 0; /* Increased margin for spacing */
        }
        .buttons button {
            width: 60px; /* Larger buttons */
            height: 60px;
            margin: 0 15px; /* Adjusted margin */
            font-size: 24px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: transparent; /* Transparent background for icons */
        }
        .like-btn {
            color: #4CAF50; /* Changed to green color for icon */
        }
        .dislike-btn {
            color: #f44336; /* Changed to red color for icon */
        }
        .like-btn:hover, .dislike-btn:hover {
            opacity: 0.8; /* Added hover effect */
        }
        .like-btn i, .dislike-btn i {
            vertical-align: middle; /* Center icons vertically */
        }
    </style>
</head>
<body>
<!-- Navigation Bar (Top) -->
<div class="navbar">
    <img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Memevibe Logo">
    <a href="{{ url('/') }}">Home</a>
</div>

<!-- Logo in Top Left Corner -->
<!-- Removed since logo is now in the navbar -->

<!-- Main Content -->
<div class="content">
    <!-- Photo Frame (Placeholder for now) -->
    <div class="photo-frame">
        <img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Placeholder Photo">
    </div>

    <!-- Like and Dislike Buttons with Emojis (AI told me it's possible)-->
    <div class="buttons">
        <button class="like-btn"><i class="fas fa-thumbs-up"></i></button>
        <button class="dislike-btn"><i class="fas fa-thumbs-down"></i></button>
    </div>
</div>
</body>
</html>
