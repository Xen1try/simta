<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Akun Panitia
            [
                'name' => 'Super Admin Panitia TA',
                'username' => 'panitia_ta',
                'email' => 'panitia@polman.ac.id',
                'password' => Hash::make('password123'),
                'nomor_induk' => '198803242022031001',
                'role_id' => 1, // Panitia
                'status_ta' => 'N/A',
            ],
            // Akun Kaprodi
            [
                'name' => 'Bapak Kaprodi',
                'username' => 'kaprodi',
                'email' => 'kaprodi@polman.ac.id',
                'password' => Hash::make('password123'),
                'nomor_induk' => '198803242022031002',
                'role_id' => 2, // Kaprodi
                'status_ta' => 'N/A',
            ],
            // Akun Mahasiswa
            [
                'name' => 'Aqila Bihar Ijazilah',
                'username' => '223443005',
                'email' => 'aqila@polman.ac.id',
                'password' => Hash::make('password123'),
                'nomor_induk' => '223443005',
                'role_id' => 5, // Mahasiswa
                'status_ta' => 'Belum Dapat Judul',
            ],
            [
                'name' => 'Arbiyan Saputra',
                'username' => '223443028',
                'email' => 'arbiyan@polman.ac.id',
                'password' => Hash::make('password123'),
                'nomor_induk' => '223443028',
                'role_id' => 5, // Mahasiswa
                'status_ta' => 'Belum Dapat Judul',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
