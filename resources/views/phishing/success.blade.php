<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook Login Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            text-align: center;
        }
        .nav-menu {
            background: #4267B2;
            color: white;
            padding: 15px;
            text-align: left;
        }
        .nav-menu a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }
        .nav-menu a:hover {
            text-decoration: underline;
        }
        .container {
            width: 600px;
            margin: auto;
            margin-top: 100px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .details {
            text-align: left;
            margin-top: 30px;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 5px;
        }
        .details p {
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            background: #4267B2;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            font-weight: bold;
        }
        .btn:hover {
            background: #365899;
        }
    </style>
</head>
<body>
    <div class="nav-menu">
        <a href="{{ route('phishing.dashboard') }}">Dashboard</a>
        <a href="{{ route('campaigns.index') }}">Campaigns</a>
    </div>
    
    <div class="container">
        <div class="success-message">
            <i class="fa fa-check-circle"></i> You are logged in!
        </div>
        <p>Thank you for logging into your Facebook account. Your session has been successfully authenticated.</p>
        
        <div class="details">
            <h3>Account Details:</h3>
            @if(isset($userData['email']))
                <p><strong>Email:</strong> {{ $userData['email'] }}</p>
            @endif
            
            @if(isset($userData['first_name']) && isset($userData['last_name']))
                <p><strong>Name:</strong> {{ $userData['first_name'] }} {{ $userData['last_name'] }}</p>
            @endif
            
            <p><strong>Login Time:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>
            <p><strong>IP Address:</strong> {{ request()->ip() }}</p>
        </div>
        
        <a href="{{ route('phishing.dashboard') }}" class="btn">View Dashboard</a>
    </div>
</body>
</html> 