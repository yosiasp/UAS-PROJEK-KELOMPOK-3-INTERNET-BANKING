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
                @if (session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif
                <h1>Login ke Internet Banking</h1>
                <div class="loginWindow">
                    <form action="{{ route('login') }}" method="POST" class="login-form">
                        @csrf
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                        <label for="pin">PIN:</label>
                        <input type="password" id="pin" name="pin" required>
                        @error('pin')
                            <p>{{ $message }}</p>
                        @enderror
                        <button>Masuk</button>
                    </form>
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
