<!DOCTYPE html>
<html>
<head>
    <style>
        /* General styles for the email */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body p {
            margin: 10px 0;
        }
        .email-body a {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .email-body a:hover {
            background-color: #45a049;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }
        .email-footer a {
            color: #4caf50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Verify Your Email Address</h1>
        </div>
        
        <!-- Body -->
        <div class="email-body">
            <p>Hello,</p>
            <p>Thank you for signing up! To complete your registration, please verify your email address by OTP below:</p>
           {{ $details['code'] }}
            <p>If you didn’t create an account with us, please ignore this email.</p>
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; 2024 String Technology Ltd. All rights reserved.</p>
            <p>
                Need help? <a href="mailto:support@stringtech.com">Contact Support</a>
            </p>
        </div>
    </div>
</body>
</html>
