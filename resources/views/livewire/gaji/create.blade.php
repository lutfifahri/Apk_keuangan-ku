<div class="container mx-auto p-6">
    <!-- Home Icon and Title -->
    <div class="flex items-center mb-4">
        <div class="w-6 flex justify-center">
            <i class="fas fa-wallet text-lg"></i>
        </div>
        <span class="ml-3 text-lg font-semibold">{{ $title }}</span>
    </div>

    <!-- Main Content Area -->
    <div class="bg-white shadow-md rounded-lg p-12">
        <div class="flex justify-between items-center mb-2">
            <form wire:submit.prevent="{{ $page_meta['form']['action'] }}">
                {{-- <x-card.body> --}}
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="pihak_tujuan" class="form-label">Nama ( GAJI )</label>
                        <input type="text" id="pihak_tujuan" class="form-control"
                            wire:model.defer="form.pihak_tujuan">
                        @error('form.pihak_tujuan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- </x-card.body> --}}
                <button type="submit" variant="primary"><span class="spinner-border spinner-border-sm me-2"
                        role="status" wire:loading wire:target="{{ $page_meta['form']['action'] }}"></span>
                    Submit
                </button>
            </form>
        </div>
    </div>


</div>
