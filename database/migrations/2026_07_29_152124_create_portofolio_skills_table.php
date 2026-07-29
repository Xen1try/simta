<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portofolio_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke Mahasiswa

            // 9 Domain Skill (Skala misal: 0-5)
            $table->integer('domain_1')->default(0);
            $table->integer('domain_2')->default(0);
            $table->integer('domain_3')->default(0);
            $table->integer('domain_4')->default(0);
            $table->integer('domain_5')->default(0);
            $table->integer('domain_6')->default(0);
            $table->integer('domain_7')->default(0);
            $table->integer('domain_8')->default(0);
            $table->integer('domain_9')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolio_skills');
    }
};
