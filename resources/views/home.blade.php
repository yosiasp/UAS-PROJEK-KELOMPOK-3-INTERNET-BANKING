<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Home</title>
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
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('transfer')">Transfer Dana</a>
                    <ul class="sub-menu" id="transfer">
                        <li><a href="{{ route('accountList', ['id' => $account->id]) }}">Daftar Rekening Tujuan</a></li>     
                        <li><a href="{{ route('transfer', ['id' => $account->id]) }}">Transfer</a></li>
                    </ul> 
                </li>

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
            <div class="dateTime">
                <p>Tanggal: <span id="current-date"></span></p> 
                <p>Jam: <span id="current-time"></span></p> 
            </div>
            @if ($mostRecentLogin)
                <p class="last-login">Login Terakhir Anda Tanggal: {{ \Carbon\Carbon::parse($mostRecentLogin->datetime)->format('d/m/Y H:i:s') }}</p>
            @endif
            <h1>Halo {{ $account->fullname }}, Selamat Datang Di Internet Banking Bank Sejahtera</h1>
            <p>Silahkan memilih menu di sebelah kiri untuk mengakses fitur-fitur kami.</p>
            <img src="{{ asset('img/Home.JPG') }}" width="60%" height="60%">
            <div class="contactInfo">
                <h3>UNTUK INFO LEBIH LANJUT</h3>
                <h3>HUBUNGI KAMI DI 123-456-7890</h3>
            </div>
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

        function updateDateTime() {
            // Membuat object date baru untuk menyimpan date and time
            var now = new Date();
            
            // Memformat tanggal, bulan, dan tahun menjadi string dua digit
            var date = String(now.getDate()).padStart(2, '0');
            var month = String(now.getMonth() + 1).padStart(2, '0'); 
            var year = now.getFullYear();
            
            // Memformat jam, menit dan detik menjadi string dua digit
            var hours = String(now.getHours()).padStart(2, '0');
            var minutes = String(now.getMinutes()).padStart(2, '0');
            var seconds = String(now.getSeconds()).padStart(2, '0');
            
            // Format untuk menampilkan tanggal dan jam
            document.getElementById('current-date').textContent = `${date}/${month}/${year}`;
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Memanggil fungsi updateDateTime setiap 1000 milidetik (1 detik) agar waktu menjadi real-time
        setInterval(updateDateTime, 1000);
        updateDateTime(); 
    </script>
</body>
</html>

