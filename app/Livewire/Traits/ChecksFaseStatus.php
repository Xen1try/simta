<?php

namespace App\Livewire\Traits;

use App\Models\SistemKontrol;

trait ChecksFaseStatus
{
    // Properti publik yang akan dibaca oleh Blade
    public bool $isFaseClosed = false;

    // Fungsi untuk mengecek status fase spesifik
    public function checkFaseStatus(string $phaseColumn): void
    {
        $kontrol = SistemKontrol::first();

        // Jika data tidak ada atau status fase false (ditutup)
        if (! $kontrol || ! $kontrol->{$phaseColumn}) {
            $this->isFaseClosed = true;
        }
    }
}
