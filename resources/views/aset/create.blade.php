<!DOCTYPE html>
<html>
<head><title>Tambah Aset</title></head>
<body>
    <h2>Tambah Aset Baru</h2>
    <a href="{{ route('aset.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('aset.store') }}" method="POST">
        @csrf

        <label>Kode Aset:</label><br>
        <input type="text" name="kode_aset" required placeholder="Contoh: LP-001">
        <br><br>

        <label>Nama Aset:</label><br>
        <input type="text" name="nama_aset" required placeholder="Contoh: Laptop Asus">
        <br><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Lokasi Awal:</label><br>
        <select name="lokasi_id" required>
            <option value="">-- Pilih Lokasi --</option>
            @foreach($lokasi as $l)
                <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required value="1">
        <br><br>

        <label>Kondisi Aset:</label><br>
        <select name="kondisi" required>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>
        <br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
