<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert Roles
        $roles = [
            ['role_name' => 'Panitia TA', 'role_slug' => 'panitia'],
            ['role_name' => 'Kaprodi', 'role_slug' => 'kaprodi'],
            ['role_name' => 'Dosen Pembimbing', 'role_slug' => 'dosen_pembimbing'],
            ['role_name' => 'Dosen Penguji', 'role_slug' => 'dosen_penguji'],
            ['role_name' => 'Mahasiswa', 'role_slug' => 'mahasiswa'],
        ];
        DB::table('roles')->insert($roles);

        // 2. Insert Permissions
        $permissions = [
            ['permission_name' => 'Kontrol Buka Tutup Fase', 'permission_code' => 'fase.kontrol'],
            ['permission_name' => 'Approve Judul Mandiri', 'permission_code' => 'judul.approve'],
            ['permission_name' => 'Eksekusi Matchmaking', 'permission_code' => 'matchmaking.execute'],
            ['permission_name' => 'Input Topik Dosen', 'permission_code' => 'topik.create'],
            ['permission_name' => 'Input Nilai Sidang', 'permission_code' => 'nilai.insert'],
        ];
        DB::table('permissions')->insert($permissions);

        // 3. Mapping Role to Permissions (Pivot)
        // Panitia TA (ID:1) punya akses fase.kontrol (ID:1) dan matchmaking.execute (ID:3)
        DB::table('role_permissions')->insert([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 3],
        ]);

        // Kaprodi (ID:2) punya akses judul.approve (ID:2)
        DB::table('role_permissions')->insert([
            ['role_id' => 2, 'permission_id' => 2],
        ]);

        // Dosen Pembimbing (ID:3) punya akses topik.create (ID:4)
        DB::table('role_permissions')->insert([
            ['role_id' => 3, 'permission_id' => 4],
        ]);

        // Dosen Penguji (ID:4) punya akses nilai.insert (ID:5)
        DB::table('role_permissions')->insert([
            ['role_id' => 4, 'permission_id' => 5],
        ]);
        
        // Data inisialisasi Sistem Kontrol (Satu baris default)
        DB::table('sistem_kontrols')->insert([
            'phase_1_active' => true,
            'phase_2_active' => false,
            'phase_3_active' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
