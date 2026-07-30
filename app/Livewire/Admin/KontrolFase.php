<?php

namespace App\Livewire\Admin;

use App\Models\SistemKontrol;
use Illuminate\View\View;
use Livewire\Component;

class KontrolFase extends Component
{
    public bool $phase_1_active = false;

    public bool $phase_2_active = false;

    public bool $phase_3_active = false;

    public function mount(): void
    {
        $kontrol = SistemKontrol::firstOrCreate(['id' => 1]);
        $this->phase_1_active = (bool) $kontrol->phase_1_active;
        $this->phase_2_active = (bool) $kontrol->phase_2_active;
        $this->phase_3_active = (bool) $kontrol->phase_3_active;
    }

    public function togglePhase(string $phaseName): void
    {
        $kontrol = SistemKontrol::first();
        if ($kontrol) {
            $kontrol->{$phaseName} = ! $kontrol->{$phaseName};
            $kontrol->save();
            $this->{$phaseName} = (bool) $kontrol->{$phaseName};

            $status = $kontrol->{$phaseName} ? 'Dibuka' : 'Ditutup';
            session()->flash('message', "Status {$phaseName} berhasil {$status}!");
        }
    }

    public function render(): View
    {
        return view('livewire.admin.kontrol-fase');
    }
}
