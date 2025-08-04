<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management Iventory ATK') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-4 mt-16">
            {{ __('Management Inventory ATK') }}
        </h2>
        <p class="text-gray-700 mb-6">{{ __('Selamat Datang, ') }} {{ Auth::user()->name }}!</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="flex justify-between items-center p-4 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800">Masukkan Barang</h3>
                    <a href="{{ route('barangMasuk.create') }}" class="text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                {{-- Contoh isi card --}}
                <!-- <ul class="text-sm text-gray-600 space-y-2">
                    @foreach ($latestBarangMasuk ?? [] as $item)
                    <li class="flex justify-between">
                        <span>{{ $item->tanggal }} - {{ $item->qty }} pcs</span>
                        <span class="text-gray-500">{{ $item->pic }}</span>
                    </li>
                    @endforeach
                </ul> -->
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="flex justify-between items-center p-4 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800">Masukkan Request</h3>
                    <a href="{{ route('requests.create') }}" class="text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="flex justify-between items-center p-4 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800">Ambil Barang</h3>
                    <a href="{{ route('atkItems.index') }}" class="text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- <ul class="text-sm text-gray-600 space-y-2">
                    @foreach ($latestBarangKeluar ?? [] as $item)
                    <li class="flex justify-between">
                        <span>{{ $item->tanggal }} - {{ $item->qty }} pcs</span>
                        <span class="text-gray-500">{{ $item->pic }}</span>
                    </li>
                    @endforeach
                </ul> -->
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-xl shadow p-5">
                <div class="flex justify-between items-center p-4 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800">Daftar Barang Kosong</h3>
                    <a href="{{ route('atkItems.habis') }}" class="text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- <ul class="text-sm text-gray-600 space-y-2">
                    @foreach ($stokKosong ?? [] as $item)
                    <li class="flex justify-between">
                        <span>{{ $item->nama_barang }}</span>
                        <span class="text-red-500 font-semibold">Habis</span>
                    </li>
                    @endforeach
                </ul> -->
            </div>

        </div>
    </div>

</x-app-layout>