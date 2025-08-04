<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-gray-900 ">
                    <div class="bg-white p-4 rounded-lg shadow mb-6">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
                            {{ __('Daftar Barang Keluar') }}
                        </h2>
                        <form method="GET" action="{{ route('barangKeluar.index') }}" class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                                <input type="date" id="start_date" name="start_date"
                                    value="{{ request('start_date') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="flex-1">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                                <input type="date" id="end_date" name="end_date"
                                    value="{{ request('end_date') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="flex items-end gap-2">
                                <button type="submit"
                                    class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded h-fit">
                                    Filter
                                </button>

                                @if(request()->has('start_date') || request()->has('end_date'))
                                <a href="{{ route('barangKeluar.index') }}"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded h-fit">
                                    Reset
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <table class="min-w-full mt-4 divide-y divide-gray-200 text-gray-700">
                        <thead class="bg-gray-50 text-gray-600 font-medium">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Tanggal</th>
                                <th class="px-6 py-3 text-left">Penerima</th>
                                <th class="px-6 py-3 text-left">Unit</th>
                                <th class="px-6 py-3 text-left">Nama Barang</th>
                                <th class="px-6 py-3 text-left">Kode Barang</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">Satuan</th>
                                <th class="px-6 py-3 text-left">PIC</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 ">
                            @foreach ($barangKeluar as $index => $out)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index +1 }}</td>
                                <td class="px-6 py-4">{{ $out->tanggal }}</td>
                                <td class="px-6 py-4">{{ $out->penerima }}</td>
                                <td class="px-6 py-4">{{ $out->unit }}</td>
                                <td class="px-6 py-4">{{ $out->atkItem->nama_barang }}</td>
                                <td class="px-6 py-4">{{ $out->atkItem->kode_barang }}</td>
                                <td class="px-6 py-4">{{ $out->qty }}</td>
                                <td class="px-6 py-4">{{ $out->satuan }}</td>
                                <td class="px-6 py-4">{{ $out->pic }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $barangKeluar->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>