<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $primaryKey = 'jadwal_id';

    protected $fillable = [
    'kelas_id',
    'guru_id',
    'mapel_id',
    'hari',
    'jam_mulai',
    'jam_selesai'
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }

    public function guru() {
        return $this->belongsTo(Guru::class, 'guru_id', 'guru_id');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'mapel_id');
    }

    public function absensis() {
        return $this->hasMany(Absensi::class, 'jadwal_id', 'jadwal_id');
    }
}
