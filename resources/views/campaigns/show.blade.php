<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Campaign - {{ $campaign->subject }}</title>
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
        h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 15px;
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
        .btn-warning {
            background: #f59e0b;
            color: white;
        }
        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .campaign-details {
            margin-top: 20px;
        }
        .campaign-info {
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
            margin-top: 15px;
        }
        .campaign-info p {
            margin-bottom: 15px;
        }
        .label {
            font-weight: 500;
            color: #4b5563;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            padding: 10px;
            background: #f9fafb;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        .phishing-link {
            word-break: break-all;
        }
        .preview-section {
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .preview-section h3 {
            margin-bottom: 15px;
        }
        .email-preview {
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            background: #fff;
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
                <h2>Campaign Details</h2>
                <div>
                    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Back to Campaigns</a>
                    <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-warning">Edit Campaign</a>
                </div>
            </div>
            
            <div class="campaign-details">
                <div class="campaign-info">
                    <p>
                        <span class="label">Campaign ID</span>
                        <div class="value">{{ $campaign->id }}</div>
                    </p>
                    
                    <p>
                        <span class="label">Subject Line</span>
                        <div class="value">{{ $campaign->subject }}</div>
                    </p>
                    
                    <p>
                        <span class="label">Phishing Link</span>
                        <div class="value phishing-link">
                            <a href="{{ $campaign->phishing_link }}" target="_blank">{{ $campaign->phishing_link }}</a>
                        </div>
                    </p>
                    
                    <p>
                        <span class="label">Created At</span>
                        <div class="value">{{ $campaign->created_at->format('Y-m-d H:i:s') }}</div>
                    </p>
                    
                    <p>
                        <span class="label">Last Updated</span>
                        <div class="value">{{ $campaign->updated_at->format('Y-m-d H:i:s') }}</div>
                    </p>
                </div>
                
                <div class="preview-section">
                    <h3>Email Body</h3>
                    <div class="email-preview">
                        {!! str_replace('{PHISHING_LINK}', $campaign->phishing_link, $campaign->email_body) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 