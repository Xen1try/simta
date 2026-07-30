<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class RoleManager extends Component
{
    public Collection $roles;
    public Collection $permissions;

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        
        if (!$user->role || $user->role->role_slug !== 'panitia') {
            abort(403, 'Akses Ditolak. Halaman ini khusus Super Admin / Panitia TA.');
        }

        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function togglePermission(int $roleId, int $permissionId): void
    {
        /** @var \App\Models\Role $role */
        $role = Role::find($roleId);
        if ($role) {
            $role->permissions()->toggle($permissionId);
            session()->flash('message', 'Hak akses berhasil diperbarui!');
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.role-manager');
    }
}