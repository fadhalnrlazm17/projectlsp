<!DOCTYPE html>
<html>
<head><title>Tambah Lokasi</title></head>
<body>
    <h2>Tambah Lokasi Baru</h2>
    <a href="{{ route('lokasi.index') }}">Kembali</a>
    <br><br>
    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf
        <label>Nama Lokasi:</label><br>
        <input type="text" name="nama_lokasi" required placeholder="Contoh: Gudang Belakang">
        <br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
