<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- Reuse home.css -->
    <style>
        /* Additional styles specific to login */
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 400px;
            background: #1e1e1e;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #333;
            color: white;
        }

        .login-container button {
            background-color: #0284C7;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-container button:hover {
            background-color: #026a9e;
        }

        .signup-link {
            color: #0284C7;
            text-decoration: none;
            margin-top: 15px;
            font-size: 14px;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff4d6d;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
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
