<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- Reuse home.css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!-- Link the new login.css -->
</head>
<body>
<div class="login-container">
    <h2>Sign In</h2>
    @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('signup') }}" class="signup-link">Don’t have an account? Sign up</a>
</div>
</body>
</html>
