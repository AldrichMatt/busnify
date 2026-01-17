<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock</title>
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
      Stock
    </h2>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
<section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
    
    <!-- Card 1 -->
    <div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4">Rp 1.575.000</div>
      <div class="w-full h-px bg-gray-200 mb-2"></div>
      <div class="text-[#8c8c8c] text-base mb-1">Total Debit</div>
      <div class="text-[#67d25f] text-sm font-medium">+35% dari Dec 2025</div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4">Rp 1.575.000</div>
      <div class="w-full h-px bg-gray-200 mb-2"></div>
      <div class="text-[#8c8c8c] text-base mb-1">Total Kredit</div>
      <div class="text-[#67d25f] text-sm font-medium">+35% dari Dec 2025</div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4">Rp 1.575.000</div>
      <div class="w-full h-px bg-gray-200 mb-2"></div>
      <div class="text-[#8c8c8c] text-base mb-1">Subtitle</div>
      <div class="text-[#67d25f] text-sm font-medium">+35% dari Dec 2025</div>
    </div>

  </div>
</section>
  <!-- Tables Section -->
<section id="tables" class="w-full pb-20">
  <div class="mx-auto px-20 flex flex-col gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Stock Flow</h3>
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[25%]">Tanggal</div>
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Nama Barang</div>
          <div class="w-[25%]">Jumlah</div>
          <div class="w-[25%]">Arah</div>
          <div class="w-[25%]">Tipe</div>
          <div class="w-[25%]">Sumber</div>
        </div>        
        <!-- Table Data Row -->
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[25%] text-[#635549]">11 Des 2026</div>
          <div class="w-[5%] text-[#181411]">100</div>
          <div class="w-[25%] text-[#635549]">Lorem Ipsum</div>
          <div class="w-[25%] text-[#181411]">20</div>
          <div class="w-[25%] text-[#181411]">masuk</div>
          <div class="w-[25%] text-[#181411]">bahan</div>
          <div class="w-[25%] text-[#181411]">pembelian</div>
        </div>
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