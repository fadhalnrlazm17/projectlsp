<!DOCTYPE html>
<html>
<head><title>Daftar Lokasi</title></head>
<body>
    <h1>Manajemen Lokasi Aset</h1>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a> |
    <a href="{{ route('lokasi.create') }}">+ Tambah Lokasi Baru</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lokasi as $l)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $l->nama_lokasi }}</td>
                <td>
                    <a href="{{ route('lokasi.edit', $l->id) }}">Edit</a>
                    <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus lokasi ini?')">
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
