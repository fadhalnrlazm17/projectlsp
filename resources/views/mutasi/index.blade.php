<!DOCTYPE html>
<html>
<head><title>Riwayat Mutasi Aset</title></head>
<body>
    <h1>Riwayat Mutasi Aset</h1>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a> |
    <a href="{{ route('mutasi.create') }}">+ Input Mutasi Baru</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Aset</th>
                <th>Lokasi Asal</th>
                <th>Lokasi Tujuan</th>
                <th>Tanggal Mutasi</th>
                <th>Petugas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasi as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->aset->nama_aset }}</td>
                <td>{{ $m->lokasiAsal->nama_lokasi }}</td>
                <td>{{ $m->lokasiTujuan->nama_lokasi }}</td>
                <td>{{ $m->created_at->format('d M Y, H:i') }}</td>
                <td>{{ $m->user->name }}</td>
                <td>{{ $m->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
