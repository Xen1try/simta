<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopikTa extends Model
{
    protected $guarded = ['id'];

    // Melakukan casting otomatis untuk kolom JSON
    protected function casts(): array
    {
        return [
            'requirement' => 'array',
        ];
    }

    // Tambahkan di dalam class TopikTa
    public function mahasiswa()
    {
        // Asumsi kolom forein key-nya adalah 'user_id' atau sesuaikan dengan struktur Anda
        return $this->belongsTo(User::class, 'user_id');
    }
}
