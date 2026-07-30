<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $guarded = ['id'];

    // Relasi Many-to-Many ke tabel permissions
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Permission, $this>
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
