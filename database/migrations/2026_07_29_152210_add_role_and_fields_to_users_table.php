<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom username
            $table->string('username')->unique()->after('name');
            
            // NIP untuk Dosen, NIM untuk Mahasiswa
            $table->string('nomor_induk')->nullable()->unique()->after('email');
            
            // Relasi ke tabel Roles
            $table->foreignId('role_id')->nullable()->after('password')->constrained('roles')->onDelete('set null');
            
            // Status TA khusus Mahasiswa
            $table->string('status_ta')->default('Belum Dapat Judul')->after('role_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn(['username', 'nomor_induk', 'role_id', 'status_ta']);
        });
    }
};