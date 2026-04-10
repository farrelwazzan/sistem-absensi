<h1>Edit Guru</h1>

<a href="{{ route('guru.index') }}">Kembali</a>

<form action="{{ route('guru.update', $guru->guru_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nama Guru</label><br>
        <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}">
        @error('nama')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Pilih User</label><br>
        <select name="user_id">
            <option value="">-- Pilih User --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $guru->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <br>
    <button type="submit">Update</button>
</form>