<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation - LinkrVibe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #f2482a;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }
        .email-header h2 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
        }
        .email-body h4 {
            color: #333333;
            margin-bottom: 10px;
            border-bottom: 2px solid #f4f4f4;
            padding-bottom: 5px;
        }
        .email-body p {
            color: #555555;
            margin: 10px 0;
            line-height: 1.6;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .product-table th, .product-table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #f4f4f4;
        }
        .product-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .email-footer {
            background-color: #f9f9f9;
            color: #666666;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .email-footer p {
            margin: 5px 0;
        }
        .email-footer a {
            color: #f2482a;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h2>Order Confirmation</h2>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Dear {{ $order->customer_name }},</p>
            <p>Thank you for your order! We’re thrilled to confirm your order and have started processing it.</p>

            <h4>Order Details:</h4>
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Total Price:</strong> €{{ number_format($order->total_price, 2) }}</p>

            <h4>Products:</h4>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>€{{ number_format($item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p>If you have any questions, feel free to contact us.</p>
            <p>Best regards,</p>
            <p><strong>LinkrVibe Team</strong></p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} LinkrVibe. All rights reserved.</p>
            <p>Follow us: 
                <a href="https://facebook.com/LinkrVibe">Facebook</a> | 
                <a href="https://twitter.com/LinkrVibe">Twitter</a>
            </p>
        </div>
    </div>
</body>
</html>
