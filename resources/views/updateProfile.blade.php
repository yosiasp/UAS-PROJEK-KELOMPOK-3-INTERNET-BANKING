<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/updateProfile.css') }}">
    <title>Pembaruan Data Diri</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logOut">Log Out</button>
            </form>
        </ul>
    </div>

    <div class="main-content">
        <div class="sidebar">
            <ul class="menu">
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('account-info')">Informasi Rekening</a>
                    <ul class="sub-menu" id="account-info">
                        <li><a href="{{ route('balanceInfo', ['id' => $account->id]) }}">Informasi Saldo</a></li>
                        <li><a href="{{ route('mutation', ['id' => $account->id]) }}">Mutasi Rekening</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('update-profile', ['id' => $account->id]) }}">Transfer Dana</a></li>
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="{{ route('changePin', ['id' => $account->id]) }}">Ganti PIN</a></li>
                        <li><a href="{{ route('changeEmail', ['id' => $account->id]) }}">Ubah Alamat Email</a></li>
                        <li><a href="{{ route('changePhone', ['id' => $account->id]) }}">Ubah Nomor Telepon</a></li>
                        <li><a href="{{ route('updateProfile', ['id' => $account->id]) }}">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>    

        <div class="content">
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            <h2>Administrasi - Pembaruan Data Diri</h2>
            <form class='profileUpdateForm' action="{{ route('updateProfile', ['id' => $account->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="text" name="fullname" placeholder="Masukkan Nama Lengkap Anda" value="{{ $account->fullname }}" required>
                <input type="date" name="dob" placeholder="Masukkan Tanggal Lahir Anda" value="{{ $account->dob }}" required>
                <input type="text" name="gender" placeholder="Masukkan Jenis Kelamin Anda" value="{{ $account->gender }}" required>
                <input type="text" name="address" placeholder="Masukkan Alamat Anda" value="{{ $account->address }}" required>
                <button type="submit">Perbarui Data Diri</button>
            </form>
        </div>
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
