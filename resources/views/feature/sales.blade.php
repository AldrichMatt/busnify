<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Penjualan</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
  <!-- Hero Section: Back Button and Page Title -->
<section class="w-full pb-20 pt-10">
<section id="hero" class="w-full">
  <div class="mx-20 flex flex-col gap-8">
    <!-- Back Button -->
    <a href="/" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
      <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
      <span class="text-white text-sm font-medium">Back</span>
    </a>
    
    <!-- Page Title -->
    <h2 class="text-white text-4xl md:text-5xl font-medium">
      Penjualan
    </h2>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
<section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
    <x-card title="Ayam Suwir" subtitle="Menu Terlaris" caption="+50 penjualan dalam 1 minggu terakhir" />
  </div>
</section>
  <!-- Tables Section -->
<section id="tables" class="w-full pb-20">
  <div class="mx-auto px-20 flex flex-col gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Sales</h3>
        <!-- Plus Button with Radial Gradient -->
        <button class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity"
                style="background: radial-gradient(circle, rgba(177,117,251,0.5) 0%, rgba(0,20,118,0.5) 100%);">
          +
        </button>
      </div>

      {{-- @dd($dataPenjualan) --}}
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Tanggal</div>
          <div class="w-[25%]">Nama Cust</div>
          <div class="w-[25%]">Total</div>
          <div class="w-[25%]">Metode Pembayaran</div>
          <div class="w-[10%] text-right">Detail</div>
        </div>
        
        <!-- Table Data Row -->
        @foreach ($dataPenjualan as $penjualan)
          <div class="bg-white flex justify-between odd:bg-white even:bg-gray-200 items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $penjualan->id }}</div>
            <div class="w-[25%] text-[#635549]">{{ date_format($penjualan->created_at, 'D, d M Y') }}</div>
            <div class="w-[25%] text-[#635549]">{{ $penjualan->nama_cust }}</div>
            <div class="w-[25%] text-[#181411]">Rp {{ number_format($penjualan->total, 0, '.', ',') }}</div>
            <div class="w-[25%] text-[#181411]">{{ $penjualan->metode }}</div>
            <a href='sales/{{ $penjualan->id }}' class="w-[10%] text-right text-[#3b3b3b] cursor-pointer hover:underline">Detail</a>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
</section>
  <!-- Footer Section -->
<section id="footer" class="py-8 text-center text-white/50 text-sm">
  <p>&copy; 2025 Busnify. All rights reserved.</p>
</section>

  <script>
// No custom JS required
  </script>
</body>
</html>