<?php

namespace App\Livewire\Simpan;

use App\Models\per_page;
use App\Models\simpanan;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;
use Throwable;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;
    #[Url]
    public $filter;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Url]
    public $per_page = 15;

    public $listeners = [
        'confirmedDelete',
    ];

    public $pk;
    public function mount()
    {
        $this->filter = "All";
    }

    public function delete($pk)
    {
        $this->pk = $pk;

        $this->confirm('Apakah anda yakin?', [
            'html' => 'Data Gaji ini akan dihapus!',
            'onConfirmed' => 'confirmedDelete',
        ]);
    }

    public function confirmedDelete()
    {
        $simpanan = simpanan::find($this->pk);
        if (!$simpanan) {
            $this->alert('error', 'Gagal', [
                'message' => 'Data Service Lexus tidak ditemukan!',
            ]);
        } else {
            DB::beginTransaction();

            try {
                $simpanan->detailsimpanan()->delete();
                $simpanan->delete();

                DB::commit();

                $this->alert('success', 'Berhasil', [
                    'text' => 'Data Service Lexus berhasil dihapus!',
                ]);
            } catch (Throwable $e) {
                DB::rollBack();

                $this->alert('error', 'Gagal', [
                    'text' => $e->getMessage(),
                ]);
            }
        }
    }


    public function render()
    {
        if ($this->filter == "All") {
            $this->simpanan = simpanan::query()->filter([
                'search' => $this->search,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        } else {
            $this->simpanan = simpanan::query()->filter([
                'search' => $this->search,
                'filter' => $this->filter,
            ])->orderByDesc('id')->paginate($this->per_page)->withQueryString();
        }

        return view('livewire.simpan.index', [
            'title'     => 'Simpan',
            'simpanan'  => $this->simpanan,
            'per_pages' => per_page::all(),
        ])->layout('layouts.app', [
            'title' => 'Simpan' // Pass the title here
        ]);
    }
}
