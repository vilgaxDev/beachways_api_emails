<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Thank You for Your Submission</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; background-color:#f9f9f9; color:#333;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f9f9f9; padding:20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
          
          <!-- Header -->
          <tr>
            <td align="center" style="padding:20px; background:#133236;">
               <img src="{{ $message->embed(public_path('img/logo.png')) }}" alt="Ardhiworth Logo" style="max-width: 200px; height: auto; filter: brightness(0) invert(1);">
            </td>
          </tr>

          <!-- Thank You Message -->
          <tr>
            <td style="padding:20px; text-align:center;">
              <h2 style="margin:0; color:#333;">🎉 Thank You, {{ $data['firstName'] }} {{ $data['lastName'] }}!</h2>
              <p style="color:#666; font-size:14px;">We’ve received your submission and will be in touch soon.</p>
            </td>
          </tr>

          <!-- Submission Details -->
          <tr>
            <td style="padding:20px;">
              <h3 style="margin-top:0; color:#133236;">Your Submission Details</h3>
              <table width="100%" cellpadding="5" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                  <td style="font-weight:bold; width:30%;">Name:</td>
                  <td>{{ $data['firstName'] }} {{ $data['lastName'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Email:</td>
                  <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Phone:</td>
                  <td>{{ $data['phone'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Company:</td>
                  <td>{{ $data['company'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Message:</td>
                  <td>{{ $data['message'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Package Type:</td>
                  <td>{{ $data['packageType'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold; vertical-align:top;">Selected Package:</td>
                  <td>
                    <ul style="margin:0; padding-left:15px;">
                      <li><strong>Name:</strong> {{ $data['selectedPackage']['name'] }}</li>
                      <li><strong>Price:</strong> {{ $data['selectedPackage']['price'] }}</li>
                      <li><strong>Description:</strong> {{ $data['selectedPackage']['description'] }}</li>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Contact Number:</td>
                  <td>{{ $data['contactNumber'] }}</td>
                </tr>
                <tr>
                  <td style="font-weight:bold;">Submitted At:</td>
                  <td>{{ $data['submittedAt'] }}</td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Closing -->
          <tr>
            <td style="padding:20px; text-align:center;">
              <p style="margin:0; font-size:14px; color:#555;">Thank you for choosing us!<br>We’ll be in touch shortly.</p>
              <p style="margin-top:10px; font-weight:bold; color:#333;">Best regards,<br>Ardhiworth Team</p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td align="center" style="padding:15px; background:#133236; color:#fff; font-size:12px;">
              Ardhiworth © {{ date('Y') }} | Your Property Partner
            </td>
          </tr>
          
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
