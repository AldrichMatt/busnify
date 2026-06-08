<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produksi</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
<section class="w-full pb-20 pt-10">
    <section id="hero" class="w-full">
        <div class="mx-20 flex flex-col gap-8">
            <!-- Back Button -->
            <a href="/produksi" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
                <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
                <span class="text-white text-sm font-medium">Back</span>
            </a>
        </div>
    </section>
    {{-- @dd($dataProduksi) --}}
    <div class="w-full px-20 flex flex-col">
        <div class="w-full flex flex-col">
            <div class="bg-white rounded-t-xl border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
                <div class="text-[#1e1e1e] text-2xl font-bold mb-4">{{ $dataProduksi->id_batch }}</div>
                {{-- <hr class="bg-gray-200 mb-2"> --}}
                <div class="text-[#1e1e1e] text-xl mb-1">Nama Barang : {{ $dataProduksi->nama_barang }}</div>
                <div class="text-[#1e1e1e] text-xl mb-1">Waktu Produksi : {{ $dataProduksi->tanggal_produksi }}</div>
                <div class="text-[#1e1e1e] text-xl mb-1">Modal : {{ 'Rp ' . number_format($dataProduksi->total_modal, 0, ',', '.') }}</div>
            </div>
            <!-- Table Header Row -->
            <div class="bg-gray-300 flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
                <div class="w-[25%]">#</div>
                <div class="w-[25%]">Nama</div>
                <div class="w-[25%]">Takaran</div>
                <div class="w-[25%]">Modal</div>
            </div>
            <!-- Table Data Row -->
            <div class="flex flex-col">
                @foreach($dataProduksi->data_bahan as $id => $produksi)
                <div class="odd:bg-white even:bg-gray-200 last:rounded-b-2xl flex justify-between items-center px-6 py-4 border-t border-gray-100">
                    <div class="w-[25%] text-[#635549]">{{ $id }}</div>
                    <div class="w-[25%] text-[#635549]">{{ $produksi->nama_bahan }}</div>
                    <div class="w-[25%] text-[#635549]">{{ $produksi->takaran }}{{ $produksi->satuan }}</div>
                    <div class="w-[25%] text-[#635549]">{{ 'Rp ' . number_format($produksi->modal, 0, ',', '.') }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div> 
</section>
</body>
</html>