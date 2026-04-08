<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; }
        .header { background: #133236; color: white; padding: 10px 20px; text-align: center; }
        .content { padding: 20px; }
        .field { margin-bottom: 10px; }
        .label { font-weight: bold; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('img/logo.png')) }}" alt="Ardhiworth Logo" style="max-width: 200px; height: auto; margin-bottom: 10px; filter: brightness(0) invert(1);">
            <h2>New Property Enquiry Received</h2>
        </div>
        <div class="content">
            <div class="field"><span class="label">Property:</span> 
                @if($enquiry->property_url)
                    <a href="{{ $enquiry->property_url }}">{{ $enquiry->property_title ?? 'View Property' }}</a>
                @else
                    {{ $enquiry->property_title ?? 'N/A' }}
                @endif
            </div>
            <div class="field"><span class="label">Customer Name:</span> {{ $enquiry->customer_name }}</div>
            <div class="field"><span class="label">Customer Email:</span> {{ $enquiry->customer_email }}</div>
            <div class="field"><span class="label">Customer Phone:</span> {{ $enquiry->customer_phone }}</div>
            <hr>
            <div class="field">
                <span class="label">Message:</span><br>
                {{ $enquiry->message }}
            </div>
        </div>
        <div class="footer">
            Sent from <a href="https://admins.ardhiworth.co.ke" style="color: #133236; font-weight: bold; text-decoration: none;">Ardhiworth Admin Dashboard</a>
        </div>
    </div>
</body>
</html>
