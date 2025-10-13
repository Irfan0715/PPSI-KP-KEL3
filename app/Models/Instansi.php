<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'alamat',
        'kontak',
        'telepon',
        'kontak_person',
        'jenis_instansi',
        'kota',
        'provinsi',
        'kode_pos',
        'email',
        'website',
        'status',
        'status_aktif',
        'status_verifikasi',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function lowonganKPs()
    {
        return $this->hasMany(LowonganKP::class);
    }

    public function kuotas()
    {
        return $this->hasMany(Kuota::class);
    }

    // Scope untuk instansi aktif
    public function scopeAktif($query)
    {
        $table = $this->getTable();
        if (Schema::hasColumn($table, 'status')) {
            return $query->where('status', true);
        }
        if (Schema::hasColumn($table, 'status_aktif')) {
            return $query->where('status_aktif', true);
        }
        return $query; // fallback: tidak filter jika kolom tidak ada
    }
}
