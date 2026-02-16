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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->foreignId('mapel_id')
                ->constrained('mapels', 'mapel_id')
                ->onDelete('cascade');
            $table->foreignId('kelas_id')
                ->constrained('kelas', 'kelas_id')
                ->onDelete('cascade');
            $table->foreignId('guru_id')
                ->constrained('gurus', 'guru_id')
                ->onDelete('cascade');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
