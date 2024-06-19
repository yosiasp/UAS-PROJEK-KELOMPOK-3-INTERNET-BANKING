<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS untuk styling pagination -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mutation.css') }}">
    <title>Mutasi Rekening</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></li>
            <li><a class="logOut" href="{{ url('/') }}">[Log Out]</a></li>
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
                <li><a href="{{ route('transfer', ['id' => $account->id]) }}">Transfer Dana</a></li>
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="{{ route('changePin', ['id' => $account->id]) }}">Ganti PIN</a></li>
                        <li><a href="{{ route('changeEmail', ['id' => $account->id]) }}">Ubah Alamat Email</a></li>
                        <li><a href="{{ route('changePhone', ['id' => $account->id]) }}">Ubah Nomor Telepon</a></li>
                        <li><a href="#">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="content">
            <h2>Informasi Rekening - Mutasi Rekening</h2>

            <form method="GET" action="{{ route('mutation', $account->id) }}" class="filter-form">
                <label for="sort_order">Urutan:</label>
                    <select name="sort_order" id="sort_order">
                    <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Lama ke Baru</option>    
                    <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Baru ke Lama</option>
                </select>
            <label for="filter_type">Tipe:</label>
                <select name="filter_type" id="filter_type">
                    <option value="all" {{ $filterType == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="in" {{ $filterType == 'in' ? 'selected' : '' }}>Uang Masuk</option>
                    <option value="out" {{ $filterType == 'out' ? 'selected' : '' }}>Uang Keluar</option>
                </select>
                <button type="submit">Terapkan</button>
            </form>

            @if($personalMutations->isEmpty())
                <p>Tidak ada mutasi</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah</th></th>
                            <th>Tipe</th>
                            <th>Deksripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personalMutations as $mutation)
                        <tr>
                            <td>{{ $mutation->date }}</td>
                            <td>Rp{{ $mutation->amount }}</td>
                            <td>{{ $mutation->type }}</td>
                            <td>{{ $mutation->news }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-links">
                    {{ $personalMutations->appends(request()->input())->links() }}  
                </div>
            @endif
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
