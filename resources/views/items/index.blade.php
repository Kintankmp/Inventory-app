<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Daftar Barang') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-grayish">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                <a href="{{ route('items.create') }}" class="bg-primary hover:bg-red-900 text-white px-4 py-2 rounded text-center w-full md:w-auto">
                    + Tambah Barang
                </a>

                <form method="GET" action="{{ route('items.index') }}" class="w-full md:w-1/2">
                    <div class="flex">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau ID barang..."
                            class="w-full border-gray-300 rounded-l px-4 py-2 focus:ring-primary focus:border-primary">
                        <button type="submit" class="bg-primary text-white px-4 rounded-r hover:bg-red-900">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-x-auto shadow rounded-lg">
                <table class="min-w-full table-auto text-sm md:text-base">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">ID Barang</th>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-50">
                        @forelse($items as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $item->item_id }}</td>
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->quantity }}</td>
                            <td class="px-4 py-2">{{ $item->input_date }}</td>
                            <td class="px-4 py-2 space-y-2 md:space-y-0 md:space-x-2">
                                <a href="{{ route('items.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>

                                <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin?')" class="text-red-600 hover:underline">Hapus</button>
                                </form>

                                <form action="{{ route('items.reduce', $item) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="number" name="amount" placeholder="Kurangi" class="w-20 border px-1 rounded mb-1 md:mb-0" required min="1">
                                    <button class="text-primary hover:underline">OK</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                Tidak ada data ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
