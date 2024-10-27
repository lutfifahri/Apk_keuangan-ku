<div class="w-full max-w-md mx-auto mt-10">
    @if (session()->has('error'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-red-700 p-4 rounded-md" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <div class="text-center my-6">
        <h2 class="text-4xl font-bold text-blue-800 mb-2">
            APLIKASI <span class="text-blue-500">KEUANGAN KU</span>
        </h2>
        <p class="text-gray-600 text-lg mb-4">
            Kelola dan Pantau Keuangan Anda dengan Mudah
        </p>
        <hr class="border-b-2 border-blue-400 w-1/2 mx-auto my-4">
    </div>


    <form wire:submit.prevent="login" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" wire:model="email" id="email"
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" wire:model="password" id="password"
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                Login
            </button>
        </div>
    </form>
</div>
