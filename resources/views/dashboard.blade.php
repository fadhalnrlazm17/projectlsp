<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Aset</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .nav { margin-bottom: 20px; background: #eee; padding: 10px; }
        .nav a { margin-right: 15px; text-decoration: none; color: blue; font-weight: bold; }
        .card-container { display: flex; gap: 20px; }
        .card { border: 1px solid #ccc; padding: 20px; border-radius: 8px; width: 200px; background: #f9f9f9; }
        .logout-btn { background: red; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>

    <div class="nav">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('kategori.index') }}">Kategori Aset</a>
        <a href="{{ route('lokasi.index') }}">Lokasi</a>
        <a href="{{ route('aset.index') }}">Data Aset</a>
        <a href="{{ route('mutasi.index') }}">Mutasi Aset</a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline; float:right;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p>Anda login sebagai: <strong>{{ Auth::user()->role }}</strong></p>

    <hr>

    <div class="card-container">
        <div class="card">
            <h3>Total Aset</h3>
            <h1>{{ $totalAset }}</h1>
        </div>
        <div class="card">
            <h3>Total Kategori</h3>
            <h1>{{ $totalKategori }}</h1>
        </div>
        <div class="card">
            <h3>Total Lokasi</h3>
            <h1>{{ $totalLokasi }}</h1>
        </div>
    </div>

</body>
</html>
