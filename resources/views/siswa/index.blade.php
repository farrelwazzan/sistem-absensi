<h1>Data Siswa</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('siswa.create') }}">Tambah Siswa</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Nis</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>

    @foreach($siswa as $s)
    <tr>
        <td>{{ $s->nama }}</td>
        <td>{{ $s->nis }}</td>
        <td>{{ $s->kelas->nama_kelas }}</td>
        <td>
            <a href="{{ route('siswa.show', $s->siswa_id) }}">Detail</a>
            <a href="{{ route('siswa.edit', $s->siswa_id) }}">Edit</a>

            <form action="{{ route('siswa.destroy', $s->siswa_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>