<!DOCTYPE html>
<html>
<head><title>Data Aset</title></head>
<body>
    <h1>Manajemen Data Aset</h1>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a> |
    <a href="{{ route('aset.create') }}">+ Tambah Aset Baru</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Lokasi Saat Ini</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aset as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->kode_aset }}</td>
                <td>{{ $a->nama_aset }}</td>
                <td>{{ $a->kategori->nama_kategori }}</td>
                <td>{{ $a->lokasi->nama_lokasi }}</td>
                <td>{{ $a->jumlah }}</td>
                <td>{{ $a->kondisi }}</td>
                <td>
                    <a href="{{ route('aset.edit', $a->id) }}">Edit</a>
                    <form action="{{ route('aset.destroy', $a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus aset ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
