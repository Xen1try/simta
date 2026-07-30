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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, $this>
     */
    public function mahasiswa(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_lama_id');
    }
}
