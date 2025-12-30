# Payment Gateway Setup Guide

## Razorpay Integration

This project includes Razorpay payment gateway integration for processing online payments.

### Installation

1. Install Razorpay PHP SDK:
```bash
composer require razorpay/razorpay
```

### Configuration

Add the following to your `.env` file:

```env
RAZORPAY_KEY_ID=your_razorpay_key_id
RAZORPAY_KEY_SECRET=your_razorpay_key_secret
RAZORPAY_WEBHOOK_SECRET=your_webhook_secret
```

### Getting Razorpay Credentials

1. Sign up at [Razorpay Dashboard](https://dashboard.razorpay.com/)
2. Go to Settings > API Keys
3. Generate API keys (Key ID and Key Secret)
4. Copy the keys to your `.env` file

### Webhook Setup

1. Go to Razorpay Dashboard > Settings > Webhooks
2. Add webhook URL: `https://yourdomain.com/payments/webhook`
3. Select events:
   - `payment.captured`
   - `payment.failed`
   - `refund.created`
4. Copy the webhook secret to your `.env` file

### Usage

#### Initialize Payment

```javascript
// Frontend JavaScript
fetch('/payments/initialize', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        order_id: orderId,
        payment_method: 'online_payment'
    })
})
.then(response => response.json())
.then(data => {
    if (data.success && data.type === 'online') {
        // Initialize Razorpay checkout
        var options = {
            "key": data.gateway_order.key_id,
            "amount": data.gateway_order.amount,
            "currency": data.gateway_order.currency,
            "name": "Ecomarc Punjabi Shop",
            "description": "Order Payment",
            "order_id": data.gateway_order.order_id,
            "handler": function (response) {
                // Handle payment success
                handlePaymentSuccess(response);
            },
            "prefill": {
                "name": customerName,
                "email": customerEmail,
                "contact": customerPhone
            },
            "theme": {
                "color": "#F97316"
            }
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
});

function handlePaymentSuccess(response) {
    fetch('/payments/callback', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            razorpay_order_id: response.razorpay_order_id,
            razorpay_payment_id: response.razorpay_payment_id,
            razorpay_signature: response.razorpay_signature
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect_url;
        }
    });
}
```

#### Include Razorpay Checkout Script

Add to your layout file:

```html
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
```

### API Endpoints

- `POST /payments/initialize` - Initialize payment for an order
- `POST /payments/callback` - Handle payment callback
- `POST /payments/webhook` - Handle Razorpay webhooks
- `POST /payments/{payment}/refund` - Process refund

### Payment Methods Supported

- Online Payment (Razorpay)
- Cash on Delivery
- UPI
- Bank Transfer

### Testing

Use Razorpay test credentials for testing:
- Test Key ID: Available in Razorpay Dashboard
- Test Key Secret: Available in Razorpay Dashboard
- Test Cards: See Razorpay documentation for test card numbers

