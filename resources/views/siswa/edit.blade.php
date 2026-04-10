<h1>Edit Siswa</h1>
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('siswa.update', $siswa->siswa_id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nis" value="{{ $siswa->nis }}">
    <input type="text" name="nama" value="{{ $siswa->nama }}">

    <select name="kelas_id">
        @foreach($kelas as $k)
            <option value="{{ $k->kelas_id }}"
                {{ $siswa->kelas_id == $k->kelas_id ? 'selected' : '' }}>
                {{ $k->nama_kelas }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>