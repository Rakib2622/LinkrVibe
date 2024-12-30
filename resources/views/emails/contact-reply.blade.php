<!DOCTYPE html>
<html>
<head>
    <title>Reply to Your Inquiry - LinkrVibe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }
        .email-header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            margin: 10px 0;
            color: #333333;
        }
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #000000;
            color: #ffffff;
            font-size: 12px;
        }
        .btn {
            display: inline-block;
            background-color: #f2482a;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <h1>LinkrVibe Support</h1>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <p>Dear Customer,</p>
            <p>{{ $messageBody }}</p>
            <p>We’re here to help if you have any further questions or concerns. Feel free to reach out to us anytime.</p>
            <a href="{{ url('/') }}" class="btn">Visit LinkrVibe</a>
            <p>Best regards,</p>
            <p><strong>LinkrVibe Team</strong></p>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} LinkrVibe. All rights reserved.</p>
            <p>Follow us: 
                <a href="https://facebook.com/LinkrVibe" style="color: #ee583e;">Facebook</a> | 
                <a href="https://twitter.com/LinkrVibe" style="color: #ee583e;">Twitter</a>
            </p>
        </div>
    </div>
</body>
</html>
