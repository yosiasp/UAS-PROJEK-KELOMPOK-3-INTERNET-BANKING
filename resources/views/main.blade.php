<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <title>Internet Banking - Bank Sejahtera</title>
    </head>
    <body>
        <div class="header">
            <p class="logo">INTERNET BANKING SEJAHTERA</p>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></a></li>
            </ul>
        </div>

        <div class="hero">
            <div class="content">
                <div class="texts">
                    <h1>Internet Banking</h1>
                    <h3>Dengan Internet Banking Bank Sejahtera, Anda dapat berinteraksi dengan BRI selama 24 jam sehari, 7 hari seminggu, 365 hari setahun, di manapun Anda berada. 
                    Disertai dengan tingkat keamanan yang tinggi menggunakan teknologi kriptografi dengan menggunakan SSL yang akan mengacak dan menyandikan data transaksi, dan interface mudah dimengerti dan digunakan.
                    </h3>
                </div>
                
                <div class="buttons">
                    <button onclick="location.href='{{ url('/login') }}'" > Login</button>
                    <button class ="newAccount" onclick="location.href='{{ url('/create-account') }}'" >Buat akun</button>
                </div>
            </div>
        </div>    

        <div class="image">
            <img src = "{{ asset('img/LandingPage.JPG') }}" width="100%" height="100%">
        </div>

        <div class="footer">
            <p>Copyright &#169 2024 Bank Sejahtera (Persero) tbk</p>
        </div>
    </body>
</html>
