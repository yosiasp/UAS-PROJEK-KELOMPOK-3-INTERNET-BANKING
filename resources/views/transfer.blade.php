<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/transfer.css') }}">
    <title>Transfer</title>
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
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if (session('status'))
                <p class="status-message">{{ session('status') }}</p>
            @endif
            <h2>Transfer Dana - Transfer</h2>
            @if($accountList->isEmpty())
                <h3>Belum Ada Nomor Rekening yang Terdaftar</h3>
                <p>Silakan mendaftarkan nomor rekening terlebih dahulu.</p>
                <a href="{{ route('accountList', ['id' => $account->id]) }}">Daftarkan Rekening Baru</a>
            @else
                <form id='transferForm' class = "transferInfo" method="POST" action="{{ route('transfer.store', ['id' => $account->id]) }}">
                    @csrf
                    <label for="account">No rekening</label>
                    <select id="account" name="account" required>
                        @foreach($accountList as $account)
                            <option value="{{ $account->accountNumber }}">{{ $account->accountNumber }} {{ $account->fullname }}</option>
                        @endforeach
                    </select>

                    <label for="amount">Jumlah</label>
                    <input type="text" id="amount" name="amount" required>

                    <label for="description">Berita</label>
                    <input type="text" id="description" name="description">

                    <input type="submit" value="Transfer">
                </form>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>&#169; 2024 Bank Sejahtera (Persero) tbk</p>
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

        document.getElementById('account').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Membuang input yang bukan angka
            e.target.value = value;
        });

        document.getElementById('amount').addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, ''); // Membuang input yang bukan angka
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Menambahkan titik sebagai separator
            e.target.value = value;
        });

        document.getElementById('transferForm').addEventListener('submit', function (e) {
            let amountInput = document.getElementById('amount');
            let value = amountInput.value.replace(/\./g, ''); // Membuang titik pemisah sebelum dimasukan ke back-end
            amountInput.value = value;
        });
    </script>
</body>
</html>
