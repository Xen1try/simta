<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\TopikTa;
use App\Livewire\Traits\ChecksFaseStatus;

class InputJudulMandiri extends Component
{
    use ChecksFaseStatus, WithFileUploads;

    public $judul_topik,$deskripsi, $ruang_lingkup,$bukti_acc;

    public function mount()
    {
        $this->checkFaseStatus('phase_1_active');
    }

    public function ajukanJudul()
    {
        if ($this->isFaseClosed) return;

        $this->validate([
            'judul_topik' => 'required|min:10',
            'deskripsi' => 'required',
            'bukti_acc' => 'required|file|mimes:pdf,jpg,png|max:2048', // Maks 2MB
        ]);

        $path =$this->bukti_acc->store('bukti_acc_kaprodi', 'public');

        TopikTa::create([
            'judul_topik' => $this->judul_topik,
            'deskripsi' => $this->deskripsi,
            'ruang_lingkup' => $this->ruang_lingkup,
            'bukti_acc' => $path,
            'asal_usul' => 'Mandiri',
            'kategori' => 'Bukan Projek',
            'status_approval_kaprodi' => 'Pending',
            'mahasiswa_lama_id' => auth()->id(), // Simpan ID mhs pengusul di sini sbg referensi
        ]);

        session()->flash('message', 'Judul Mandiri berhasil diajukan! Menunggu persetujuan Kaprodi.');
        $this->reset(['judul_topik', 'deskripsi', 'ruang_lingkup', 'bukti_acc']);
    }

    public function render()
    {
        return view('livewire.mahasiswa.input-judul-mandiri');
    }
}
