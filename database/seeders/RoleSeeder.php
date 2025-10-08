<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator sistem dengan akses penuh'
            ],
            [
                'name' => 'Dosen Supervisor',
                'slug' => 'dosen-supervisor',
                'description' => 'Dosen yang bertugas sebagai supervisor KP'
            ],
            [
                'name' => 'Dosen Biasa',
                'slug' => 'dosen-biasa',
                'description' => 'Dosen yang bertugas sebagai pembimbing KP'
            ],
            [
                'name' => 'Mahasiswa',
                'slug' => 'mahasiswa',
                'description' => 'Mahasiswa yang mengikuti program kerja praktek'
            ],
            [
                'name' => 'Pengawas Lapangan',
                'slug' => 'pengawas-lapangan',
                'description' => 'Pengawas lapangan yang mengawasi mahasiswa KP di instansi'
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}
