<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/costumerService.css') }}">
        <title>Costumer Service - Bank Sejahtera</title>
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
                <h1>Customer Service</h1>
                <div class="service-info">
                    <h2>Informasi kontak</h2>
                    <p>Hubungi kami:</p>
                    <ul>
                        <li><strong>Nomor Telepon:</strong> 123-456-7890</li>
                        <li><strong>Whatsapp:</strong> 156-396-4210</li>
                        <li><strong>Email:</strong> support@banksejahtera.com</li>
                        <li><strong>Alamat Kantor:</strong> Jl. Ciputat Raya no 14, Jakarta Selatan</li>
                    </ul>
                    <h2>Opsi Layanan</h2>
                    <p>Kami menyediakan beberapa opsi layanan untuk anda:</p>
                    <ul>
                        <li>Live Chat Whatsapp 24/7: Siap membantu kendala perbankan 24 jam selama 7 hari</li>
                        <li>Email Support: Mendapat respon dalam kurun waktu 24 jam </li>
                        <li>Phone Support: Berbicara langsung dengan petugas kami </li>
                    </ul>
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
