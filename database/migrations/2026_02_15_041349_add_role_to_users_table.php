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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('guru_mapel');
            $table->json('roles')->nullable()->after('password');
            $table->string('nip')->nullable()->unique()->after('roles');
            $table->string('phone', 15)->nullable()->after('nip');
            $table->boolean('is_active')->default(true)->after('phone');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['roles', 'nip', 'phone', 'is_active']);
            $table->string('role')->default('guru_mapel');
        });
    }
};
