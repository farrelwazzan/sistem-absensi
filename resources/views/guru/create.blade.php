<h1>Tambah Guru</h1>

<a href="{{ route('guru.index') }}">Kembali</a>

<form action="{{ route('guru.store') }}" method="POST">
    @csrf

    <div>
        <label>Nama Guru</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
        @error('nama')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Pilih User</label><br>
        <select name="user_id">
    <option value="">-- Pilih User Guru --</option>

    @foreach ($users as $user)
        <option value="{{ $user->id }}"
            {{ old('user_id') == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach
</select>
        @error('user_id')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <br>
    <button type="submit">Simpan</button>
</form>