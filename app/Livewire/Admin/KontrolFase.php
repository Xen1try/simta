<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SistemKontrol;
use Livewire\Attributes\Layout;

class KontrolFase extends Component
{
    public $phase_1_active;
    public $phase_2_active;
    public $phase_3_active;

    public function mount()
    {
        // Ambil data baris pertama. Jika kosong, buat default-nya.
        $kontrol = SistemKontrol::firstOrCreate(
            ['id' => 1],
            [
                'phase_1_active' => false, 
                'phase_2_active' => false, 
                'phase_3_active' => false
            ]
        );

        // Masukkan data ke properti agar dirender ke UI
        $this->phase_1_active = $kontrol->phase_1_active;
        $this->phase_2_active = $kontrol->phase_2_active;
        $this->phase_3_active = $kontrol->phase_3_active;
    }

    // Fungsi ini dipanggil saat Toggle diklik
    public function togglePhase($phaseName)
    {
        $kontrol = SistemKontrol::first();
        
        if ($kontrol) {
            // Balikkan nilai dari true ke false atau sebaliknya
            $kontrol->{$phaseName} = !$kontrol->{$phaseName};
            $kontrol->save();

            // Perbarui state di frontend secara real-time
            $this->{$phaseName} = $kontrol->{$phaseName};
            
            // Munculkan notifikasi sukses
            session()->flash('message', "Status $phaseName berhasil diperbarui!");
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.kontrol-fase');
    }
}
