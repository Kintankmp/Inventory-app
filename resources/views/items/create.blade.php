<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Input Barang') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-grayish">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('items.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block font-medium text-gray-700">ID Barang</label>
                        <input type="text" name="item_id" value="{{ old('item_id') }}"
                               class="w-full border-gray-300 rounded px-3 py-2 focus:ring-primary focus:border-primary" required>
                        @error('item_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Nama Barang</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border-gray-300 rounded px-3 py-2 focus:ring-primary focus:border-primary" required>
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}"
                               class="w-full border-gray-300 rounded px-3 py-2 focus:ring-primary focus:border-primary" required>
                        @error('quantity')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Input</label>
                        <input type="date" name="input_date" value="{{ old('input_date') }}"
                               class="w-full border-gray-300 rounded px-3 py-2 focus:ring-primary focus:border-primary" required>
                        @error('input_date')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-primary hover:bg-red-900 text-white px-6 py-2 rounded transition w-full sm:w-auto">
                            Simpan Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
