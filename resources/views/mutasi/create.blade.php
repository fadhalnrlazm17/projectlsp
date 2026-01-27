<!DOCTYPE html>
<html>
<head><title>Input Mutasi</title></head>
<body>
    <h2>Input Mutasi Aset (Pindah Lokasi)</h2>
    <a href="{{ route('mutasi.index') }}">Kembali</a>
    <br><br>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('mutasi.store') }}" method="POST">
        @csrf

        <label>Pilih Aset:</label><br>
        <select name="aset_id" required>
            <option value="">-- Pilih Aset yang mau dipindah --</option>
            @foreach($aset as $a)
                <option value="{{ $a->id }}">
                    {{ $a->nama_aset }} (Lokasi saat ini: {{ $a->lokasi->nama_lokasi }})
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Pindah ke Lokasi Tujuan:</label><br>
        <select name="lokasi_tujuan_id" required>
            <option value="">-- Pilih Lokasi Tujuan --</option>
            @foreach($lokasi as $l)
                <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Keterangan / Alasan:</label><br>
        <textarea name="keterangan" placeholder="Contoh: Dipinjam untuk presentasi"></textarea>
        <br><br>

        <button type="submit">Proses Mutasi</button>
    </form>
</body>
</html>
