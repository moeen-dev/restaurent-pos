<form method="POST" action="{{ route('register.otp.verify') }}">
    @csrf

    <h2>Enter OTP</h2>

    <input type="text" name="otp" maxlength="6" required placeholder="Enter 6-digit OTP">

    <button type="submit">Verify</button>

    @error('otp')
    <p style="color:red">{{ $message }}</p>
    @enderror
</form>