<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'guru_id';

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
    ];

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jadwal
    public function jadwals() {
        return $this->hasMany(Jadwal::class, 'guru_id', 'guru_id');
    }

    // Guru bisa menjadi wali dari 1 kelas
    public function kelasWali() {
        return $this->hasOne(Kelas::class, 'wali_kelas_id', 'guru_id');
    }
}
