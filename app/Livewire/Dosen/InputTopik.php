<?php

namespace App\Livewire\Dosen;

use Livewire\Component;
use App\Models\TopikTa;
use App\Livewire\Traits\ChecksFaseStatus;

class InputTopik extends Component
{
    use ChecksFaseStatus;

    public $judul_topik, $deskripsi,$ruang_lingkup, $kategori = 'Bukan Projek',$kuota_mahasiswa = 1;
    public $mahasiswa_lama_id;
    
    // Array untuk menampung 9 domain skill (0-5)
    public $requirement = [
        'domain_1' => 0, 'domain_2' => 0, 'domain_3' => 0,
        'domain_4' => 0, 'domain_5' => 0, 'domain_6' => 0,
        'domain_7' => 0, 'domain_8' => 0, 'domain_9' => 0,
    ];

    public function mount()
    {
        $this->checkFaseStatus('phase_1_active');
    }

    public function simpanTopik()
    {
        if ($this->isFaseClosed) return;

        $this->validate([
            'judul_topik' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Bukan Projek,Tipe 1,Tipe 2,Tipe 3',
        ]);

        TopikTa::create([
            'judul_topik' => $this->judul_topik,
            'deskripsi' => $this->deskripsi,
            'ruang_lingkup' => $this->ruang_lingkup,
            'asal_usul' => 'Dosen',
            'kategori' => $this->kategori,
            'kuota_mahasiswa' => $this->kuota_mahasiswa,
            'pengusul_dosen_id' => auth()->id(),
            'mahasiswa_lama_id' => $this->kategori === 'Tipe 1' ?$this->mahasiswa_lama_id : null,
            'requirement' => in_array($this->kategori, ['Tipe 2', 'Tipe 3']) ?$this->requirement : null,
        ]);

        session()->flash('message', 'Usulan Topik TA berhasil disimpan!');
        $this->reset(['judul_topik', 'deskripsi', 'ruang_lingkup', 'kategori', 'mahasiswa_lama_id']);
    }

    public function render()
    {
        return view('livewire.dosen.input-topik');
    }
}
