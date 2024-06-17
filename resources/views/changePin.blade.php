<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Change PIN</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Costumer Service</a></li>
            <li><a class="logOut" href="{{ url('/') }}">[Log Out]</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Change PIN</h1>
        <form action="{{ route('change-pin') }}" method="post">
            @csrf
            @method('PUT')
            <input type="password" name="pinlama" placeholder="Masukkan PIN lama">
            <input type="password" name="pinbaru" placeholder="Masukkan PIN baru">
            <button type="submit">Change PIN</button>
        </form>
    </div>

    <div class="footer">
        <p>Copyright &#169 2024 Bank Sejahtera (Persero) tbk</p>
    </div>

    <script>
        function toggleSubMenu(id) {
            var subMenu = document.getElementById(id);
            if (subMenu.style.display === "block") {
                subMenu.style.display = "none";
            } else {
                subMenu.style.display = "block";
            }
        }
    </script>
</body>
</html>
