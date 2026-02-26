<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $primaryKey = 'mapel_id';

    protected $fillable = [
        'nama_mapel',
    ];

    // Mapel punya banyak jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'mapel_id', 'mapel_id');
    }
}
