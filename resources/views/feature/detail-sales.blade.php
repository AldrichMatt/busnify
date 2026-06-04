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
            <a href="/sales" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
                <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
                <span class="text-white text-sm font-medium">Back</span>
            </a>
        </div>
    </section>
    {{-- @dd($dataPenjualan) --}}
    <div class="w-[70%] px-20 flex flex-col">
        <div class="w-full flex flex-col">
            <div class="bg-white rounded-t-2xl border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
                <div class="text-[#1e1e1e] text-2xl font-bold mb-4">{{ $dataPenjualan->nama_cust }}</div>
                {{-- <hr class="bg-gray-200 mb-2"> --}}
                <div class="text-[#1e1e1e] text-xl mb-1">{{ date_format($dataPenjualan->created_at, 'D, d M Y') }}</div>
            </div>
            <hr>
            <!-- Table Header Row -->
            <div class="bg-white flex justify-between items-center px-6 py-3 text-[#635549] text-base font-normal">
                <div class="w-[5%]"></div>
                <div class="w-[45%]">Nama Menu</div>
                <div class="w-[45%]">Harga</div>
            </div>
            <!-- Table Data Row -->
            <div class="flex flex-col">
                @foreach($dataPenjualan->detail as $detail)
                <div class="bg-white border-b-2 flex justify-between items-center px-6 py-4 text-sm border-t border-gray-100">
                    <div class="w-[5%] text-[#635549]">{{ $detail->jumlah }}x</div>
                    <div class="w-[45%] text-[#635549]">{{ $detail->barang->nama }}</div>
                    <div class="w-[45%] text-[#635549]">Rp {{ number_format($detail->total, 0, '.', ',') }}</div>
                </div>
                @endforeach
                <div class="text-xs bg-white">
                    <div class=" flex justify-between items-center px-6 py-2 border-t border-gray-600"> 
                        <div class="w-[25%] text-[#635549]">Charge</div>
                        <div class="w-[45%] text-[#635549]">+ Rp {{ number_format($dataPenjualan->charge, 0, '.', ',') }}</div>
                    </div>
                    <div class="flex justify-between items-center px-6 py-2">
                        <div class="w-[25%] text-[#635549]">Ongkir</div>
                        <div class="w-[45%] text-[#635549]">+ Rp {{ number_format($dataPenjualan->ongkir, 0, '.', ',') }}</div>
                    </div>
                </div>
                <div class="bg-white flex justify-between items-center px-6 py-2 font-bold text-2xl">
                    <div class="w-[25%] text-[#635549]">Total</div>
                    <div class="w-[45%] text-[#635549]">Rp {{ number_format($dataPenjualan->total, 0, '.', ',') }}</div>
                </div>
                <div class="bg-white flex justify-between items-center px-6 py-2 text-sm border-b-2 border-gray-500">
                    <div class="w-[25%] text-[#635549]">Metode Pembayaran</div>
                    <div class="w-[45%] text-[#635549]">{{ $dataPenjualan->metode }}</div>
                </div>
            </div>

            <div class="bg-white rounded-b-2xl border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
                <div class="text-[#1e1e1e] mb-1">
                    Cetak Struk
                </div>
            </div>
        </div>
    </div> 
</section>
</body>
</html>