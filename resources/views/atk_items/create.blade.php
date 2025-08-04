<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah ATK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('atkItems.store') }}" method="POST" class="space-y-4">
                    {{-- Nama Barang --}}
                    @csrf
                    <div class="flex items-center gap-4">
                        <label for="nama_barang" class="w-40 text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Kode Barang --}}
                    <div class="flex items-center gap-4">
                        <label for="kode_barang" class="w-40 text-sm font-medium text-gray-700">Kode Barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Jumlah --}}
                    <div class="flex items-center gap-4">
                        <label for="qty" class="w-40 text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="qty" name="qty" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Lokasi Simpan --}}
                    <div class="flex items-center gap-4">
                        <label for="lokasi_simpan" class="w-40 text-sm font-medium text-gray-700">Lokasi Simpan</label>
                        <input type="text" id="lokasi_simpan" name="lokasi_simpan" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-6 rounded-full transition duration-200">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> -->
