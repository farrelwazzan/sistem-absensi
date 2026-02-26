<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Guru Mapel
        User::create([
            'name' => 'Guru Mapel',
            'email' => 'guru@test.com',
            'password' => Hash::make('password'),
            'role' => 'guru_mapel',
        ]);

        // Wali Kelas
        User::create([
            'name' => 'Wali Kelas',
            'email' => 'wali@test.com',
            'password' => Hash::make('password'),
            'role' => 'wali_kelas',
        ]);
    }
}