<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $primaryKey = 'absensi_id';

    protected $fillable = [
        'jadwal_id',
        'siswa_id',
        'tanggal',
        'status',
        'status_validasi'
    ];

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'siswa_id');
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'jadwal_id');
    }
}
