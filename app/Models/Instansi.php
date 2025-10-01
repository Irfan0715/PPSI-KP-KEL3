<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'telepon',
        'email',
        'website',
        'jenis_instansi',
        'deskripsi',
        'kontak_person',
        'jabatan_kontak',
        'no_hp_kontak',
        'kuota_mahasiswa',
        'kebutuhan_keahlian',
        'status_aktif',
        'fasilitas'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'status_aktif' => 'boolean'
    ];

    // Relationship dengan KP (akan dibuat nanti)
    public function kerjaPrakteks()
    {
        return $this->hasMany(KerjaPraktek::class);
    }

    // Scope untuk instansi aktif
    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    // Scope untuk mencari berdasarkan jenis instansi
    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis_instansi', $jenis);
    }

    // Scope untuk mencari berdasarkan lokasi
    public function scopeByLokasi($query, $kota)
    {
        return $query->where('kota', $kota);
    }
}
