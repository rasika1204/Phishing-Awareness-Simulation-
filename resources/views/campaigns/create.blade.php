<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Phishing Campaign</title>
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: normal;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: normal;
            color: #4a5568;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            box-sizing: border-box;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #a5c9ff;
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.2);
        }
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: normal;
            cursor: pointer;
            margin-right: 10px;
            font-size: 14px;
            border: none;
        }
        .btn-primary {
            background: #10b981;
            color: white;
        }
        .btn-secondary {
            background: #6B7280;
            color: white;
        }
        .btn-primary:hover {
            background: #059669;
        }
        .error {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 5px;
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
        <h2>Create New Campaign</h2>
        
        <form action="{{ route('campaigns.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                @error('subject')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email_body">Email Body:</label>
                <textarea name="email_body" id="email_body" required>{{ old('email_body') }}</textarea>
                @error('email_body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="phishing_link">Phishing Link:</label>
                <input type="text" name="phishing_link" id="phishing_link" value="{{ old('phishing_link', url('/facebook-login')) }}" required>
                @error('phishing_link')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Campaign</button>
                <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>