<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f7f9; color: #333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="600"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td align="center" style="padding: 40px 0 20px 0; background-color: #007bff;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">{{ config('app.name') }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="margin-top: 0; color: #222;">Password Reset Request for Your {{
                                config('app.name') }} Account</h2>
                            <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                Hello, <span style="color: #1b1b1b; font-weight: 500;">{{ $name }}</span>
                            </p>
                            <p style="font-size: 16px; line-height: 1.6; color: #555;">
                                We received a request to reset the password for your account. Click the button below to
                                choose a new password.
                            </p>
                            <div style="text-align: center; padding: 30px 0;">
                                <a href="{{ $link }}" target="_blank"
                                    style="background-color: #007bff; color: #ffffff; padding: 15px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">Reset
                                    Password</a>
                            </div>
                            <p style="font-size: 14px; line-height: 1.6; color: #777;">
                                If you didn't request this, you can safely ignore this email. This link will expire in
                                60 minutes.
                            </p>
                            <hr style="border: 0; border-top: 1px solid #eeeeee; margin: 30px 0;">
                            <p style="font-size: 12px; color: #999; line-height: 1.4;">
                                If you're having trouble clicking the button, copy and paste the URL below into your web
                                browser:<br>
                            <div
                                style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 4px; padding: 15px; margin-top: 20px; text-align: center;">
                                <p style="margin: 0 0 10px 0; font-size: 13px; color: #666;">Or copy and paste this link
                                    into your browser:</p>

                                <div
                                    style="background-color: #ffffff; border: 1px dashed #007bff; padding: 10px; margin-bottom: 10px;">
                                    <span
                                        style="color: #007bff; font-family: monospace; font-size: 14px; word-break: break-all;">
                                        {{ $link }}
                                    </span>
                                </div>

                                <p style="font-size:12px; color:#888;">
                                    Tap and hold the link above to copy it.
                                </p>
                            </div>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 20px 30px; background-color: #f9f9f9; text-align: center; font-size: 12px; color: #aaa;">
                            &copy; 2026 {{ config('app.name') }} | 123 Tech Lane, Silicon Valley, CA
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>