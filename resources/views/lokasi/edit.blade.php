<!DOCTYPE html>
<html>
<head><title>Edit Lokasi</title></head>
<body>
    <h2>Edit Lokasi</h2>
    <a href="{{ route('lokasi.index') }}">Kembali</a>
    <br><br>
    <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
        @csrf @method('PUT')
        <label>Nama Lokasi:</label><br>
        <input type="text" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" required>
        <br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
