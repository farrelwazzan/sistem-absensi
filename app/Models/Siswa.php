<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'siswa_id';

    protected $fillable = [
        'nis',
        'nama',
        'kelas_id',
    ];

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }

    // Siswa punya banyak absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'siswa_id', 'siswa_id');
    }
}
