<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
<div class="signup-container">
    <h2>Sign Up</h2>

    <!-- Display success message if present -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display validation errors if present -->
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('signup') }}">
        @csrf

        <!-- Username Field -->
        <div class="form-group">
            <label for="username" class="label-white">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required class="input-white">
            @error('username')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email" class="label-white">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required class="input-white">
            @error('email')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password" class="label-white">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required class="input-white">
            <p class="password-hint">Password must be at least 8 characters long.</p>
            @error('password')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Confirmation Field -->
        <div class="form-group">
            <label for="password_confirmation" class="label-white">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required class="input-white">
            @error('password_confirmation')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit">Sign Up</button>
    </form>
</div>
</body>
</html>
