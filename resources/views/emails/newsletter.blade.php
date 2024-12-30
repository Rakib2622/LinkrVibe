<!DOCTYPE html>
<html>
<head>
    <title>LinkrVibe Newsletter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
            padding: 20px;
        }
        .email-header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body p {
            margin: 15px 0;
            color: #333333;
            font-size: 16px;
        }
        .email-body .btn {
            display: inline-block;
            background-color: #f2482a;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            background-color: #333333;
            color: #ffffff;
            font-size: 14px;
        }
        .email-footer a {
            color: #4caf50;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
        .social-links a {
            margin: 0 5px;
            color: #ffffff;
            text-decoration: none;
        }
        .social-links a:hover {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <h1>Welcome to LinkrVibe</h1>
        </div>

        <!-- Body Section -->
        <div class="email-body">
            <p>Dear Valued Subscriber,</p>
            <p>
                {{ $messageBody }}
            </p>
            <p>
                Thank you for subscribing to the LinkrVibe Newsletter! We’re thrilled to have you onboard. Stay tuned for exciting updates, industry insights, and exclusive offers crafted just for you.
            </p>
            <a href="{{ url('/') }}" class="btn">Explore LinkrVibe</a>
            <p>Thank you for being part of the LinkrVibe community.</p>
            <p>Warm regards,<br><strong>The LinkrVibe Team</strong></p>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} LinkrVibe. All rights reserved.</p>
            <p>
                Follow us: 
                <span class="social-links">
                    <a href="https://facebook.com/LinkrVibe">Facebook</a> | 
                    <a href="https://twitter.com/LinkrVibe">Twitter</a> | 
                    <a href="https://instagram.com/LinkrVibe">Instagram</a>
                </span>
            </p>
        </div>
    </div>
</body>
</html>
