<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id('absensi_id');
            $table->foreignId('jadwal_id')
                ->constrained('jadwals', 'jadwal_id')
                ->onDelete('cascade');
            $table->foreignId('siswa_id')
                ->constrained('siswas', 'siswa_id')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha']);
            $table->enum('status_validasi', ['Submitted', 'Validated', 'Rejected'])
                ->default('Submitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
