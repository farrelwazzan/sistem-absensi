<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $primaryKey = 'kelas_id';

    protected $fillable = [
        'nama_kelas',
        'jurusan',
        'wali_kelas_id'
    ];
    
    // Kelas punya banyak siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'kelas_id');
    }

    // Kelas punya banyak jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kelas_id', 'kelas_id');
    }

    // Kelas punya 1 wali kelas
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id', 'guru_id');
    }
}
