<div class="container mx-auto p-6">
    <!-- Home Icon and Title -->
    <div class="flex items-center mb-4">
        <div class="w-6 flex justify-center">
            <i class="fas fa-save text-lg"></i>
        </div>
        <span class="ml-3 text-lg font-semibold">{{ $title }}</span>
    </div>

    <!-- Main Content Area -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-2xl font-bold">
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-plus text-lg"></i></a>
            </h3>
            <input type="text" wire:model.live="search" placeholder="Search"
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
                    @forelse ($simpanan as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->keterangan }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="#" class="btn btn-sm btn-warning"><i
                                        class="fas fa-pencil text-lg"></i></a> |
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash text-lg"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-2 px-4 border-b" colspan="4">
                                <center>Not found</center>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <br>
        <div class="col-12">
            {{ $simpanan->links() }}
        </div>
    </div>


</div>
