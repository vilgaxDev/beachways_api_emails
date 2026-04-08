<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; }
        .header { background: #133236; color: white; padding: 10px 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('img/logo.png')) }}" alt="Ardhiworth Logo" style="max-width: 200px; height: auto; margin-bottom: 10px; filter: brightness(0) invert(1);">
            <h2>Thank You for Your Enquiry</h2>
        </div>
        <div class="content">
            <p>Dear {{ $enquiry->customer_name }},</p>
            <p>We have received your enquiry regarding 
                @if($enquiry->property_url)
                    <strong><a href="{{ $enquiry->property_url }}">{{ $enquiry->property_title ?? 'our property' }}</a></strong>.
                @else
                    <strong>{{ $enquiry->property_title ?? 'our property' }}</strong>.
                @endif
            </p>
            <p>Our team has received your information and we will get back to you as soon as possible.</p>
            <p>Best regards,<br>Ardhiworth Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Ardhiworth. All rights reserved.
        </div>
    </div>
</body>
</html>
