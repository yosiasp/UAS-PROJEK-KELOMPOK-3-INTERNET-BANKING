<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/syaratKetentuan.css') }}">
    <title>Syarat dan Ketentuan - Bank Sejahtera</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/costumer-service') }}">Costumer Service</a></a></li>
        </ul>
    </div>
    <div class="hero">
        <div class="content">
            <h1>Terms and Conditions</h1>
            <div class="terms-content">
                <p>Welcome to Bank Sejahtera Internet Banking. Please read these terms and conditions carefully before using our services.</p>

                <h2>1. Acceptance of Terms</h2>
                <p>By using our services, you agree to be bound by these terms and conditions.</p>

                <h2>2. User Responsibilities</h2>
                <p>You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</p>

                <h2>3. Privacy Policy</h2>
                <p>Your privacy is important to us. Please review our privacy policy to understand how we collect, use, and protect your information.</p>

                <h2>4. Changes to Terms</h2>
                <p>We reserve the right to modify these terms at any time. Your continued use of our services constitutes acceptance of the revised terms.</p>

                <h2>5. Contact Information</h2>
                <p>If you have any questions about these terms, please contact us at support@banksejahtera.com.</p>

                <p>Thank you for choosing Bank Sejahtera.</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Copyright &#169; 2024 Bank Sejahtera (Persero) tbk</p>
    </div>
</body>
</html>
