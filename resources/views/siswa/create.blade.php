<h1>Tambah Siswa</h1>
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <input type="text" name="nis" placeholder="NIS">
    <input type="text" name="nama" placeholder="Nama">

    <select name="kelas_id">
        @foreach($kelas as $k)
            <option value="{{ $k->kelas_id }}">
                {{ $k->nama_kelas }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>