<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* simple AI designed styling */
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
            max-height: 60px; /* Adjust logo size in navbar */
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
        .navbar a img {
            border: none; /* Remove any default border on the clickable logo */
        }
        .navbar a:hover img {
            opacity: 0.8; /* Optional hover effect for the logo */
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
            padding: 20px;
        }
        .photo-frame {
            border: 2px solid #333;
            padding: 30px; /* Increased padding */
            margin: 50px 0; /* Lower the frame with more vertical spacing */
            text-align: center;
            background-color: #ffffff; /* Changed to white for better contrast */
            width: 100%; /* Use 100% to fit container */
            max-width: 600px; /* Max width for larger screens */
            height: auto; /* Let height adjust based on content */
            min-height: 200px; /* Minimum height for smaller screens */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added shadow for depth */
        }
        .photo-frame img {
            max-width: 100%;
            max-height: 100%;
            height: auto; /* Ensure image scales properly */
        }
        .buttons {
            margin: 20px 0; /* Increased margin for spacing */
        }
        .buttons button {
            width: 50px; /* Slightly smaller for mobile */
            height: 50px;
            margin: 0 10px;
            font-size: 20px; /* Slightly smaller for mobile */
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

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                padding: 5px; /* Reduce padding on smaller screens */
            }
            .navbar img {
                max-height: 30px; /* Smaller logo on mobile */
                margin-right: 10px;
            }
            .navbar a {
                padding: 5px 10px;
                font-size: 14px; /* Smaller font size */
            }
            .content {
                margin-top: 60px; /* Less space for smaller navbar */
                padding: 10px;
            }
            .photo-frame {
                padding: 15px; /* Reduce padding */
                margin: 30px 0;
                max-width: 90vw; /* Use viewport width for smaller screens */
                min-height: 150px; /* Smaller minimum height */
            }
            .buttons button {
                width: 40px; /* Smaller buttons */
                height: 40px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .navbar img {
                max-height: 25px; /* Even smaller logo */
                margin-right: 5px;
            }
            .navbar a {
                padding: 5px;
                font-size: 12px;
            }
            .content {
                margin-top: 50px;
                padding: 5px;
            }
            .photo-frame {
                padding: 10px;
                margin: 20px 0;
                max-width: 85vw;
                min-height: 120px;
            }
            .buttons button {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<!-- Navigation Bar (Top) -->
<div class="navbar">
    <a href="{{ url('/') }}"><img src="{{ asset('images/Memevibe_logo.jpg') }}" alt="Memevibe Logo"></a>
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

    <!-- Like and Dislike Buttons with Emojis (AI told me it's possible) -->
    <div class="buttons">
        <button class="dislike-btn"><i class="fas fa-thumbs-down"></i></button>
        <button class="like-btn"><i class="fas fa-thumbs-up"></i></button>
    </div>
</div>
</body>
</html>
