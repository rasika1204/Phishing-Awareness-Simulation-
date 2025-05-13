<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phishing Campaigns</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: normal;
            color: #333;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: normal;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: normal;
            cursor: pointer;
            margin-right: 5px;
            font-size: 14px;
            border: none;
        }
        .btn-primary {
            background: #10b981;
            color: white;
        }
        .btn-success {
            background: #3b82f6;
            color: white;
        }
        .btn-warning {
            background: #f59e0b;
            color: white;
        }
        .btn-danger {
            background: #ef4444;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #e5e7eb;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f9fafb;
            color: #374151;
            font-weight: 500;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:hover {
            background-color: #f3f4f6;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laravel</h1>
        <div class="dropdown">
            <button class="dropdown-btn">Dennis ▾</button>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="top-actions">
                <h2>Phishing Campaigns</h2>
                <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Create New Campaign</a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(count($campaigns) > 0)
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Phishing Link</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->id }}</td>
                                <td>{{ $campaign->subject }}</td>
                                <td>
                                    <a href="{{ $campaign->phishing_link }}" target="_blank">
                                        {{ Str::limit($campaign->phishing_link, 40) }}
                                    </a>
                                </td>
                                <td>{{ $campaign->created_at->format('Y-m-d H:i') }}</td>
                                <td class="actions">
                                    <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-success">View</a>
                                    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this campaign?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No campaigns found. Create your first campaign!</p>
            @endif
        </div>
    </div>
</body>
</html>  