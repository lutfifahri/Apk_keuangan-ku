<?php

namespace App\Livewire\Form\Gaji;

use Exception;
use Throwable;
use App\Models\Gaji;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Livewire\Form;

class StoreGajiForm extends Form
{
    // Define form properties
    #[Validate('required', message: 'Nama tidak boleh kosong!')]
    public $name;
    #[Validate('required', message: 'Nilai tidak boleh kosong!')]
    public $nilai;
    #[Validate('required', message: 'Keterangan tidak boleh kosong!')]
    public $keterangan;

    public function save()
    {
        DB::beginTransaction();

        try {
            $gaji = Gaji::create([
                'name' => $this->name,
                'nilai' => $this->nilai,
                'keterangan' => $this->keterangan

            ]);

            $this->reset();

            return $gaji;
        } catch (\Throwable $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }
}
