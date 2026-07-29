<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topik_tas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_topik');
            $table->text('deskripsi');
            $table->text('ruang_lingkup')->nullable();
            $table->string('bukti_acc')->nullable();
            $table->enum('asal_usul', ['Mandiri', 'Dosen']);
            $table->enum('kategori', ['Bukan Projek', 'Tipe 1', 'Tipe 2', 'Tipe 3']);
            $table->integer('kuota_mahasiswa')->default(1);
            
            // Kolom JSON untuk menampung Requirement Skill Dosen
            $table->json('requirement')->nullable(); 
            
            // Relasi ke Dosen yang mengusulkan
            $table->foreignId('pengusul_dosen_id')->nullable()->constrained('users')->noActionOnDelete('cascade');
            
            // Relasi ke Mahasiswa (Untuk Tipe 1 - Mahasiswa Lama)
            $table->foreignId('mahasiswa_lama_id')->nullable()->constrained('users')->noActionOnDelete('set null');
            
            // Approval Kaprodi
            $table->enum('status_approval_kaprodi', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->text('catatan_kaprodi')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topik_tas');
    }
};
