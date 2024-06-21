<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
     <title>Change Email</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJATERA</p>
        <ul>
          <li><a href="{{ route('home', ['id' => Auth::user()->id]) }}">Home</a></li> 
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
                <a href='#' class ="menu-item" onclick="toggleSubMenu('account-info')">Informasi Rekening</a>
                <ul class="sub-menu" id="account-info">
                      <li><a href="#">Informasi Saldo</a></li>
                    <li><a href= '#'>Mutasi Rekening</a></li>
                </ul>
            </li>
            <li><a href="{{ route('transfer', ['id' => Auth::user()->id]) }}">Transfer Dana</a></li>
            <li>
                <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                <ul class="sub-menu" id="administration">
                    <li><a href="#">GANTI PIN</a></li>
                    <li><a href="{{ route('changeEMailForm') }}">Ubah Alamat Email</a></li>
                    <li><a href="#">Ubah Nomor Telepon</a></li>
                    <li><a href="#">Pembaruan Data Diri</a></li>
                </ul>
            </li>
        </ul>
    </div>
        
   <div class="content">
        <h2>Change Email</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateEmail') }}" method="POST">
            @crsf
            <div class="form-group">
                <label for="old_email">Old Email:</label>
                <input type="email" id="old_email" name="old_email" required>
            </div>
            <div class="form-group">
                <label for="new_email">New Email:</label>
                  <input type="email" id="new_email" name="new_email" required>
            </div>
            <button type="submit">Update Email</button>
        </form>
    </div>
</div>

<div class="footer">
   <p>Copyright &#169; 2024 Bank Sejahtera (Persero) tbk</p>
</div>

<script>
    function toggleSubMenu(id) {
        var subMenu = document.getElementById(id);
        if (subMenu.style.display === "block") {
            subMenu.Style.display = "none";
        } else {
            subMenu.style.display = "block";
        }
    </script>
</body>
</html>
</script>
