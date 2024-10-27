<div class="container mx-auto p-6">
    <!-- Home Icon and Title -->
    <div class="flex items-center mb-4">
        <div class="w-6 flex justify-center">
            <i class="fas fa-credit-card text-lg"></i>
        </div>
        <span class="ml-3 text-lg font-semibold">{{ $title }}</span>
    </div>

    <!-- Main Content Area -->
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-2xl font-bold">&nbsp;</h3>
            <input type="text"
                class="border border-blue-500 rounded-lg px-4 py-2 shadow focus:outline-none focus:ring-2 focus:ring-blue-300"
                placeholder="Search...">
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">Uang Wiffi</td>
                        <td class="py-2 px-4 border-b">Pembayaran untuk wiffi bulan ini</td>
                        <td class="py-2 px-4 border-b">Edit | Delete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>
