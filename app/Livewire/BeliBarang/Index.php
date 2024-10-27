<?php

namespace App\Livewire\BeliBarang;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.beli-barang.index', [
            'title'     => 'Beli Barang'
        ])->layout('layouts.app', [
            'title' => 'Beli Barang' // Pass the title here
        ]);
    }
}
