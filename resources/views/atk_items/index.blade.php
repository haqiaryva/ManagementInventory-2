<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar ATK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-gray-900">
                    <!-- <div>
                        <a href="{{ route('atkItems.create') }}" class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">
                            Tambah ATK
                        </a>
                    </div> -->


                    <form class="max-w-md mx-auto" method="GET" action="{{ route('atkItems.index') }}">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative mb-4">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" name="q"
                                autocomplete="off"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari Barang atau Kode Barang..." value="{{ request('q') }}" />
                        </div>

                        <div class="flex gap-2">
                            <select name="sort_qty" class="border rounded-lg py-2 px-3 text-sm text-gray-700 flex-grow">
                                <!-- <option value="">Urutkan Jumlah</option> -->
                                <option value="asc" {{ request('sort_qty') == 'asc' ? 'selected' : '' }}>Jumlah Terkecil</option>
                                <option value="desc" {{ request('sort_qty') == 'desc' ? 'selected' : '' }}>Jumlah Terbanyak</option>
                            </select>

                            <button type="submit"
                                class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded text-sm whitespace-nowrap">
                                Terapkan Filter
                            </button>

                            @if(request()->has('q') || request()->has('sort_qty'))
                            <a href="{{ route('atkItems.index') }}"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded text-sm whitespace-nowrap">
                                Reset
                            </a>
                            @endif
                        </div>
                    </form>

                    <br>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-600 font-medium">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama Barang</th>
                                <th class="px-6 py-3 text-left">Kode Barang</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">Satuan</th>
                                <th class="px-6 py-3 text-left">Lokasi Simpan</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @foreach ($items as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $item->nama_barang }}</td>
                                <td class="px-6 py-4">{{ $item->kode_barang }}</td>
                                <td class="px-6 py-4">{{ $item->qty }}</td>
                                <td class="px-6 py-4">{{ $item->satuan }}</td>
                                <td class="px-6 py-4">{{ $item->lokasi_simpan }}</td>
                                <td class="px-6 py-4 text-center">
                                    {{-- Tombol Ambil ATK --}}
                                    <a href="{{ route('barangKeluar.create', ['atk_item_id' => $item->id]) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-gray-500 hover:bg-gray-900 text-white text-sm font-medium rounded-full transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 10-8 0v4M5 11h14l-1.68 9.39A2 2 0 0115.34 22H8.66a2 2 0 01-1.98-1.61L5 11z" />
                                        </svg>
                                        Ambil
                                    </a>

                                    @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('atkItems.edit', $item->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-gray-500 hover:bg-gray-900 text-white text-sm font-medium rounded-full transition ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2l-6 6M4 17v3h3l10-10-3-3L4 17z" />
                                        </svg>
                                        Edit
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $items->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>