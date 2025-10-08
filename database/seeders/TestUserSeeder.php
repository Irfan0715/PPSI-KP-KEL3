<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test users for each role

        // Admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@univ.ac.id',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('admin');

        // Dosen Biasa (fixed role slug)
        $dosen = User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'dosen@univ.ac.id',
            'password' => Hash::make('password123'),
            'nip' => '198501011234567890',
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen-biasa');

        // Mahasiswa
        $mahasiswa = User::create([
            'name' => 'Andi Wijaya',
            'email' => 'mahasiswa@univ.ac.id',
            'password' => Hash::make('password123'),
            'nim' => '20210001',
            'jurusan' => 'Teknik Informatika',
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        // Mahasiswa 1
        $mahasiswa1 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'mahasiswa1@univ.ac.id',
            'password' => Hash::make('password123'),
            'nim' => '20210002',
            'jurusan' => 'Sistem Informasi',
            'email_verified_at' => now(),
        ]);
        $mahasiswa1->assignRole('mahasiswa');

        // Pembimbing Lapangan
        $pengawas = User::create([
            'name' => 'Pak Rahman',
            'email' => 'pengawas@univ.ac.id',
            'password' => Hash::make('password123'),
            'nip' => '197501011234567890',
            'email_verified_at' => now(),
        ]);
        $pengawas->assignRole('pembimbing-lapangan');

        $this->command->info('Test users created successfully!');
        $this->command->info('Email: admin@univ.ac.id | Password: password123 | Role: Admin');
        $this->command->info('Email: dosen@univ.ac.id | Password: password123 | Role: Dosen Pembimbing');
        $this->command->info('Email: mahasiswa@univ.ac.id | Password: password123 | Role: Mahasiswa');
        $this->command->info('Email: mahasiswa1@univ.ac.id | Password: password123 | Role: Mahasiswa');
        $this->command->info('Email: pengawas@univ.ac.id | Password: password123 | Role: Pembimbing Lapangan');
    }
}
