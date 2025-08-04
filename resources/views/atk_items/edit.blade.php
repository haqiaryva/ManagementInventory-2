<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ATK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('atkItems.update', $item->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center gap-4">
                        <label for="nama_barang" class="w-40 text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="kode_barang" class="w-40 text-sm font-medium text-gray-700">Kode Barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $item->kode_barang) }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="qty" class="w-40 text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="qty" name="qty" value="{{ old('qty', $item->qty) }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="satuan" class="w-40 text-sm font-medium text-gray-700">Satuan</label>
                        <input type="text" id="satuan" name="satuan" value="{{ old('satuan', $item->satuan) }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex items-center gap-4">
                        <label for="lokasi_simpan" class="w-40 text-sm font-medium text-gray-700">Lokasi Simpan</label>
                        <input type="text" id="lokasi_simpan" name="lokasi_simpan" value="{{ old('lokasi_simpan', $item->lokasi_simpan) }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-6 rounded-full transition duration-200 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-2">
                                <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                            </svg>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>