<x-app-layout>
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
                            {{ __('Daftar Request') }}
                        </h2>
                        <a href="{{ route('requests.create') }}" class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Requset ATK
                        </a>
                    </div>
                    <table class="min-w-full mt-4 divide-y divide-gray-200 text-gray-700">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-3 text-center">No</th>
                                <th class="px-6 py-3 text-left">Tanggal</th>
                                <th class="px-6 py-3 text-left">Penerima</th>
                                <th class="px-6 py-3 text-left">Unit</th>
                                <th class="px-6 py-3 text-left">Nama Barang</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">Satuan</th>
                                <th class="px-6 py-3 text-left">PIC</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($requests as $index => $req)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index +1 }}</td>
                                <td class="px-6 py-4">{{ $req->tanggal }}</td>
                                <td class="px-6 py-4">{{ $req->penerima }}</td>
                                <td class="px-6 py-4">
                                    @if($req->unit)
                                    {{ $req->unit->nama_unit }}
                                    @else
                                    - (ID: {{ $req->unit_id }})
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $req->nama_barang }}</td>
                                <td class="px-6 py-4">{{ $req->qty }}</td>
                                <td class="px-6 py-4">{{ $req->satuan }}</td>
                                <td class="px-6 py-4">{{ $req->pic }}</td>
                                <td class="px-6 py-4">
                                    @if ($req->status === 'done')
                                    <span class="text-green-900 font-semibold">Done</span>
                                    @else
                                    <span class="text-gray-500 font-medium">{{ ucfirst($req->status) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($req->status !== 'done')
                                    <form action="{{ route('requests.updateStatus', $req->id) }}" method="POST" onsubmit="return confirm('Tandai sebagai selesai?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors"
                                            title="Tandai Done">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Selesai
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-green-700 font-semibold">-</span>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>