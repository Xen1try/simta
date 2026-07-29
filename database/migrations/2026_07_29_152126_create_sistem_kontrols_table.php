<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sistem_kontrols', function (Blueprint $table) {
            $table->id();
            $table->boolean('phase_1_active')->default(false);
            $table->boolean('phase_2_active')->default(false);
            $table->boolean('phase_3_active')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sistem_kontrols');
    }
};
