<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kerja_praktek_id',
        'dosen_pembimbing_id',
        'mahasiswa_id',
        'tanggal_bimbingan',
        'topik_bimbingan',
        'hasil_bimbingan',
        'catatan',
        'metode',
        'durasi_menit',
        'status',
        'file_lampiran',
        'rating_kualitas',
        'feedback_mahasiswa',
        'feedback_dosen'
    ];

    protected $casts = [
        'tanggal_bimbingan' => 'date'
    ];

    // Relationships
    public function kerjaPraktek()
    {
        return $this->belongsTo(KerjaPraktek::class);
    }

    public function dosenPembimbing()
    {
        return $this->belongsTo(User::class, 'dosen_pembimbing_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    // Scopes
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    public function scopeByDosen($query, $dosenId)
    {
        return $query->where('dosen_pembimbing_id', $dosenId);
    }

    public function scopeByMahasiswa($query, $mahasiswaId)
    {
        return $query->where('mahasiswa_id', $mahasiswaId);
    }

    public function scopeByKerjaPraktek($query, $kerjaPraktekId)
    {
        return $query->where('kerja_praktek_id', $kerjaPraktekId);
    }

    // Helper methods
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'dijadwalkan' => '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Dijadwalkan</span>',
            'berlangsung' => '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Berlangsung</span>',
            'selesai' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded">Selesai</span>',
            'dibatalkan' => '<span class="bg-red-100 text-red-800 px-2 py-1 rounded">Dibatalkan</span>',
            default => '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Unknown</span>'
        };
    }

    public function getMetodeBadgeAttribute()
    {
        return match($this->metode) {
            'offline' => '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Offline</span>',
            'online' => '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Online</span>',
            default => '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Unknown</span>'
        };
    }

    public function getRatingStarsAttribute()
    {
        if (!$this->rating_kualitas) return '';

        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= $i <= $this->rating_kualitas
                ? '<i class="fas fa-star text-yellow-400"></i>'
                : '<i class="far fa-star text-gray-300"></i>';
        }
        return $stars;
    }
}
