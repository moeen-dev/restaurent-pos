<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f7fb; padding:20px;">

    <div style="max-width:500px; margin:auto; background:white; padding:30px; border-radius:8px; text-align:center;">

        <h2 style="color:#111;">Reset Your Password</h2>

        <p style="color:#555;">
            We received a request to reset your password.
        </p>

        <!-- 🔥 BUTTON -->
        <a href="{{ $link }}" style="
            display:inline-block;
            margin-top:20px;
            padding:12px 25px;
            background:#2563EB;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-weight:bold;
        ">
            Reset Password
        </a>

        <p style="margin-top:20px; font-size:12px; color:#888;">
            This link will expire in 60 minutes.
        </p>

        <p style="font-size:12px; color:#999;">
            If you didn’t request this, you can ignore this email.
        </p>

        <!-- fallback link -->
        <p style="margin-top:15px; font-size:12px;">
            Or copy this link:<br>
            <span style="color:#2563EB;">{{ $link }}</span>
        </p>

    </div>

</body>

</html>