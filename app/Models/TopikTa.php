<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * @return BelongsTo<User, $this>
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_lama_id');
    }
}
