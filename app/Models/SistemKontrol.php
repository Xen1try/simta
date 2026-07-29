<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SistemKontrol extends Model
{
    protected $guarded = ['id'];

    // Memastikan tipe data dikonversi secara otomatis
    protected function casts(): array
    {
        return [
            'phase_1_active' => 'boolean',
            'phase_2_active' => 'boolean',
            'phase_3_active' => 'boolean',
        ];
    }
}
