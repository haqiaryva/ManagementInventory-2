<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                            {{ __('Daftar Barang Kosong') }}
                        </h2>
                        <a href="{{ route('atkItems.exportPdf') }}" class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Cetak
                        </a>
                    </div>
                    <table class="min-w-full mt-4 divide-y divide-gray-200 text-gray-700">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Tanggal</th>
                                <th class="px-6 py-3 text-left">Penerima</th>
                                <th class="px-6 py-3 text-left">Unit</th>
                                <th class="px-6 py-3 text-left">Nama Barang</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">PIC</th>
                                <th class="px-6 py-3 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($requests as $index => $req)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index +1 }}</td>
                                <td class="px-6 py-4">{{ $req->tanggal }}</td>
                                <td class="px-6 py-4">{{ $req->penerima }}</td>
                                <td class="px-6 py-4">{{ $req->unit }}</td>
                                <td class="px-6 py-4">{{ $req->nama_barang }}</td>
                                <td class="px-6 py-4">{{ $req->qty }}</td>
                                <td class="px-6 py-4">{{ $req->pic }}</td>
                                <td class="px-6 py-4">{{ $req->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> -->