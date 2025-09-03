<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>New Contact Submission</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; background-color:#f9f9f9; color:#333;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f9f9f9; padding:20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
          
          <!-- Header with Logo -->
          <tr>
            <td align="center" style="padding:20px; background:#ff5ca2;">
          <img src="{{ asset('images/beachways-logo.png') }}" alt="Beachways Logo" style="max-width:200px; height:auto;" />


            </td>
          </tr>

          <!-- Title -->
          <tr>
            <td style="padding:20px; text-align:center;">
              <h2 style="margin:0; color:#333;">📩 New Contact Submission</h2>
              <p style="color:#666; font-size:14px;">A new inquiry has been submitted through your website</p>
            </td>
          </tr>

          <!-- Submission Details -->
          <tr>
            <td style="padding:20px;">
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

          <!-- Footer -->
          <tr>
            <td align="center" style="padding:15px; background:#ff5ca2; color:#fff; font-size:12px;">
              Beachways © {{ date('Y') }} | Ride on the Wave 🌊
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
