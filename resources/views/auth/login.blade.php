<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Aset</title>
</head>
<body>
    <h2>Silakan Login</h2>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ url('login') }}" method="POST">
        @csrf <div>
            <label>Email:</label><br>
            <input type="email" name="email" required placeholder="admin@gmail.com">
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required placeholder="password">
        </div>
        <br>
        <button type="submit">Masuk</button>
    </form>
</body>
</html>
