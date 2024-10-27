<?php

namespace App\Livewire\Gaji;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.gaji.index', [
            'title'     => 'Gaji',
            'judul'     => 'Gaji Anda Perbulan !'
        ])->layout('layouts.app', [
            'title' => 'Gaji' // Pass the title here
        ]);
    }
}
