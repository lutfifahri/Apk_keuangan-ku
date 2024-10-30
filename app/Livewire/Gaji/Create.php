<?php

namespace App\Livewire\Gaji;

use App\Livewire\Form\Gaji\StoreGajiForm;
use Livewire\Component;

class Create extends Component
{
    public $index;
    public StoreGajiForm $form;

    public function mount()
    {
        /** result */
    }

    public function save()
    {
        $this->form->validate();

        try {
            $gaji = $this->form->save();
            $this->flash('success', 'Berhasil', [
                'text' => 'Data Gaji berhasil ditambahkan!',
            ], route('gaji.edit', $gaji->id));
        } catch (\Throwable $e) {
            $this->alert('error', 'Gagal', [
                'text' => $e->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.gaji.create', [
            'title'     => 'Gaji',
            'page_meta' => [
                'form'      => [
                    'action'    => 'save',
                ],
            ],
        ])->layout('layouts.app', [
            'title' => 'Gaji' // Pass the title here
        ]);
    }
}
