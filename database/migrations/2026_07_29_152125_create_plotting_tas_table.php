<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plotting_tas', function (Blueprint $table) {
            $table->id();

            // Ubah semua onDelete menjadi 'no action' untuk menghindari cycle/multiple paths di SQL Server
            $table->foreignId('mahasiswa_id')
                ->constrained('users')
                ->onDelete('no action');

            $table->foreignId('topik_id')
                ->constrained('topik_tas')
                ->onDelete('no action');

            $table->foreignId('dosen_pembimbing_id')
                ->constrained('users')
                ->onDelete('no action');

            // Status Lock oleh Panitia TA
            $table->boolean('is_locked')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plotting_tas');
    }
};
