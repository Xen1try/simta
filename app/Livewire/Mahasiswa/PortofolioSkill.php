<?php

namespace App\Livewire\Mahasiswa;

use App\Livewire\Traits\ChecksFaseStatus;
use App\Models\PortofolioSkill as PortofolioModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PortofolioSkill extends Component
{
    use ChecksFaseStatus;

    // Array untuk menampung 9 nilai domain (Skala 0-5)
    public $domains = [
        1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0,
        6 => 0, 7 => 0, 8 => 0, 9 => 0,
    ];

    public function mount()
    {
        // Pengecekan Gatekeeper Phase 1
        $this->checkFaseStatus('phase_1_active');

        // Jika form terbuka, cek apakah mahasiswa sudah pernah mengisi sebelumnya
        if (! $this->isFaseClosed && Auth::check()) {
            $portofolio = PortofolioModel::where('user_id', Auth::id())->first();

            if ($portofolio) {
                // Load data dari database ke properti array Livewire
                for ($i = 1; $i <= 9; $i++) {
                    $this->domains[$i] = $portofolio->{"domain_$i"};
                }
            }
        }
    }

    public function simpanPortofolio()
    {
        if ($this->isFaseClosed) {
            return;
        }

        // Validasi agar nilai wajib integer dari 0 sampai 5
        $rules = [];
        for ($i = 1; $i <= 9; $i++) {
            $rules["domains.$i"] = 'required|integer|min:0|max:5';
        }
        $this->validate($rules);

        // UpdateOrCreate: Jika data user sudah ada, maka di-update. Jika belum, di-insert.
        PortofolioModel::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'domain_1' => $this->domains[1],
                'domain_2' => $this->domains[2],
                'domain_3' => $this->domains[3],
                'domain_4' => $this->domains[4],
                'domain_5' => $this->domains[5],
                'domain_6' => $this->domains[6],
                'domain_7' => $this->domains[7],
                'domain_8' => $this->domains[8],
                'domain_9' => $this->domains[9],
            ]
        );

        session()->flash('message', 'Data Portofolio Keahlian berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.mahasiswa.portofolio-skill');
    }
}
