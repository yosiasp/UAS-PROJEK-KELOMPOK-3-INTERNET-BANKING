<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti PIN - Bank Sejahtera</title>
</head>
<body>
    <form action="{{ route('change.pin') }}" method="POST">
        @csrf
        <div>
            <label for="pinlama">PIN Lama:</label>
            <input type="password" id="pinlama" name="pinlama" required>
        </div>
        <div>
            <label for="new_pin">PIN Baru:</label>
            <input type="password" id="new_pin" name="new_pin" required>
        </div>
        <div>
            <label for="pinbaru_confirmation">Konfirmasi PIN Baru:</label>
            <input type="password" id="pinbaru_confirmation" name="pinbaru_confirmation" required>
        </div>
        <button type="submit">Ganti PIN</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
