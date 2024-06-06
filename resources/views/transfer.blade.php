<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/transfer.css') }}">
    <title>Internet Banking - Bank Sejahtera</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}">Customer Service</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Transfer Funds</h1>

        <form method="POST" action="/transfer">
            @csrf

            <label for="account">Account Number</label>
            <input type="text" id="account" name="account" required>

            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description">

            <input type="submit" value="Transfer">
        </form>

        <h2>Transfer History</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->date }}</td>
                    <td>{{ $transfer->account }}</td>
                    <td>{{ $transfer->amount }}</td>
                    <td>{{ $transfer->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>&#169; 2024 Bank Sejahtera (Persero) tbk</p>
    </div>
</body>
</html>
