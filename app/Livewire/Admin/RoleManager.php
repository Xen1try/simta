<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use Livewire\Attributes\Layout;

class RoleManager extends Component
{
    public $roles;
    public $permissions;

    public function mount()
    {
        // Gembok Keamanan Mutlak: Hanya role 'panitia' yang boleh akses
        if (auth()->user()->role->role_slug !== 'panitia') {
            abort(403, 'Akses Ditolak. Halaman ini khusus Super Admin / Panitia TA.');
        }

        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    // Method ini akan dipicu secara real-time saat toggle diklik
    public function togglePermission($roleId, $permissionId)
    {
        $role = Role::find($roleId);
        
        // Toggle relasi many-to-many
        $role->permissions()->toggle($permissionId);

        session()->flash('message', 'Hak akses berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.admin.role-manager');
    }
}

