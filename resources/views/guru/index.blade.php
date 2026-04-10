<h1>Data Guru</h1>
@if(session('error'))
    <div style="color:red">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="color:green">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('guru.create') }}">Tambah Guru</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>User</th>
        <th>Aksi</th>
    </tr>

    @foreach ($gurus as $guru)
    <tr>
        <td>{{ $guru->guru_id }}</td>
        <td>{{ $guru->nama }}</td>
        <td>{{ $guru->user->name ?? '-' }}</td>
        <td>
            <a href="{{ route('guru.show', $guru->guru_id) }}">Detail</a>
            <a href="{{ route('guru.edit', $guru->guru_id) }}">Edit</a>

            <form action="{{ route('guru.destroy', $guru->guru_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>