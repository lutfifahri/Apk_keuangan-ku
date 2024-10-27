<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KEUANGANKU - {{ $title ?? config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col lg:flex-row h-screen">

        <!-- Sidebar -->
        <aside
            class="w-64 bg-blue-800 text-white absolute inset-y-0 left-0 transform -translate-x-full transition-transform duration-200 ease-in-out lg:relative lg:translate-x-0 flex flex-col justify-between"
            id="sidebar">
            <div class="p-2">
                <h2 class="text-xl font-bold mb-4 text-center">Logo Aplikasi</h2>
                <br>
                <hr class="border-gray-600 mb-4">
                <nav class="space-y-2">
                    <a wire:navigate href="{{ route('home') }}"
                        class="flex items-center px-4 py-2 rounded {{ request()->routeIs('home') ? 'bg-blue-600' : 'hover:bg-blue-600' }}">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-home text-lg"></i>
                        </div>
                        <span class="ml-3">Home</span>
                    </a>
                    <a wire:navigate href="{{ route('gaji') }}"
                        class="flex items-center px-4 py-2 rounded {{ request()->routeIs('gaji') ? 'bg-blue-600' : 'hover:bg-blue-600' }}">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-wallet text-lg"></i>
                        </div>
                        <span class="ml-3">Gaji</span>
                    </a>
                    <a wire:navigate href="{{ route('pembayaran') }}"
                        class="flex items-center px-4 py-2 rounded {{ request()->routeIs('pembayaran') ? 'bg-blue-600' : 'hover:bg-blue-600' }}">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-credit-card text-lg"></i>
                        </div>
                        <span class="ml-3">Pembayaran</span>
                    </a>
                    <a wire:navigate href="{{ route('belibarang') }}"
                        class="flex items-center px-4 py-2 rounded {{ request()->routeIs('belibarang') ? 'bg-blue-600' : 'hover:bg-blue-600' }}">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-shopping-cart text-lg"></i>
                        </div>
                        <span class="ml-3">Beli Barang</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-hand-holding-usd text-lg"></i>
                        </div>
                        <span class="ml-3">Di Pinjam</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-save text-lg"></i>
                        </div>
                        <span class="ml-3">Simpan</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-money-bill-wave text-lg"></i>
                        </div>
                        <span class="ml-3">Uang Masuk</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-chart-pie text-lg"></i>
                        </div>
                        <span class="ml-3">Summary</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-user text-lg"></i>
                        </div>
                        <span class="ml-3">Profile</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <div class="w-6 flex justify-center">
                            <i class="fas fa-cog text-lg"></i>
                        </div>
                        <span class="ml-3">Settings</span>
                    </a>
                </nav>
            </div>
            <div class="p-4">
                @livewire('logout')
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
            <!-- Hamburger Button for mobile -->
            <div class="lg:hidden mb-4">
                <button id="menu-btn" class="text-blue-800 focus:outline-none" aria-label="Toggle sidebar">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Page Header -->
            <header class="flex justify-between items-center border-b pb-4 mb-6">
                <h1 class="text-3xl font-semibold text-gray-700">&nbsp;</h1>
                <div class="text-gray-600 text-lg font-medium">
                    <i class="fas fa-user-circle mr-2 text-xl"></i>
                    {{ Auth::user()->name }}
                </div>
            </header>

            <!-- Slot for Content -->
            <div class="mb-80">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <footer class="bg-blue-600 text-white py-1 mt-auto">
                <div class="container mx-auto text-center">
                    <p>&copy; {{ date('Y') }} KEUANGANKU. All rights reserved.</p>
                    <p>Developed by Your Name</p>
                </div>
            </footer>
        </main>


    </div>



    <!-- Scripts -->
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Custom Script for Sidebar Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('menu-btn');

            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        });
    </script>

</body>

</html>
