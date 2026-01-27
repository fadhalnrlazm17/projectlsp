<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kategori</title>
</head>
<body>

    <h1>Manajemen Kategori Aset</h1>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a> |
    <a href="{{ route('kategori.create') }}">+ Tambah Kategori Baru</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $k)
            <tr>
                <td>{{ $loop->iteration }}</td> <td>{{ $k->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $k->id) }}">Edit</a>

                    <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
