<!DOCTYPE html>
<html>
<head><title>Edit Aset</title></head>
<body>
    <h2>Edit Data Aset</h2>
    <a href="{{ route('aset.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('aset.update', $aset->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Kode Aset:</label><br>
        <input type="text" name="kode_aset" value="{{ $aset->kode_aset }}" readonly style="background: #eee;">
        <br><br>

        <label>Nama Aset:</label><br>
        <input type="text" name="nama_aset" value="{{ $aset->nama_aset }}" required>
        <br><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ $aset->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Lokasi:</label><br>
        <select name="lokasi_id" required>
            @foreach($lokasi as $l)
                <option value="{{ $l->id }}" {{ $aset->lokasi_id == $l->id ? 'selected' : '' }}>
                    {{ $l->nama_lokasi }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" value="{{ $aset->jumlah }}" required>
        <br><br>

        <label>Kondisi Aset:</label><br>
        <select name="kondisi" required>
            <option value="Baik" {{ $aset->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ $aset->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ $aset->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </select>
        <br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
