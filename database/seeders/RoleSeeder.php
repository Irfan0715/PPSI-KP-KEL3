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
                'name' => 'Dosen Biasa',
                'slug' => 'dosen-biasa',
                'description' => 'Dosen pengajar reguler'
            ],
            [
                'name' => 'Mahasiswa',
                'slug' => 'mahasiswa',
                'description' => 'Mahasiswa yang sedang menempuh pendidikan'
            ],
            [
                'name' => 'Pengawas Lapangan',
                'slug' => 'pengawas-lapangan',
                'description' => 'Pengawas yang melakukan pengawasan di lapangan'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
