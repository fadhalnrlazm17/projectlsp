<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>

    <h2>Tambah Kategori Aset</h2>
    <a href="{{ route('kategori.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf <label>Nama Kategori:</label><br>
        <input type="text" name="nama_kategori" required placeholder="Contoh: Elektronik">
        <br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
