<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ambil ATK
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('barangKeluar.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="atk_item_id" value="{{ $atkItem->id }}">

                    {{-- Nama Barang (readonly) --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" value="{{ $atkItem->nama_barang }}" class="w-full py-2 px-4 rounded-full border border-gray-300 bg-gray-100 text-gray-700" disabled>
                    </div>

                    {{-- Tanggal --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Jumlah --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Jumlah</label>
                        <div class="w-full">
                            <input type="number" name="qty" min="1" max="{{ $atkItem->qty }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <small class="text-gray-500">Stok tersedia: {{ $atkItem->qty }}</small>
                        </div>
                    </div>

                    {{-- Satuan (readonly) --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Satuan</label>
                        <input type="text" value="{{ $atkItem->satuan }}" class="w-full py-2 px-4 rounded-full border border-gray-300 bg-gray-100 text-gray-700" disabled>
                        <input type="hidden" name="satuan" value="{{ $atkItem->satuan }}">
                    </div>

                    {{-- Penerima --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Penerima</label>
                        <input type="text" name="penerima" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    {{-- Unit --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">Unit</label>
                        <select name="unit_id" id="unit_id" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Unit --</option>
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PIC --}}
                    <div class="flex items-center gap-4">
                        <label class="w-40 text-sm font-medium text-gray-700">PIC</label>
                        <input type="text" name="pic" value="{{ Auth::user()->name }}" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required readonly>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-6 rounded-full transition duration-200 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32h192c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32v-64zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>