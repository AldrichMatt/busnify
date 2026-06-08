<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page</title>
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
    <div class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
      <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
      <span class="text-white text-sm font-medium">Back</span>
    </div>
    
    <!-- Page Title -->
    <h2 class="text-white text-4xl font-medium">
      Produksi & HPP
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
      <div class="text-[#8c8c8c] text-base mb-1">Subtitle</div>
      <div class="text-[#67d25f] text-sm font-medium">+35% dari Dec 2025</div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4">Rp 1.575.000</div>
      <div class="w-full h-px bg-gray-200 mb-2"></div>
      <div class="text-[#8c8c8c] text-base mb-1">Subtitle</div>
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
  <!-- Tables Section: Production and HPP Tables -->
<section id="tables" class="w-full pb-20">
  <div class="mx-auto px-20 flex flex-col gap-4">
    
    <!-- Table Card 1: Tabel Produksi -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Tabel Produksi</h3>
        <!-- Plus Button with Radial Gradient -->
        <button class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity"
                style="background: radial-gradient(circle, rgba(177,117,251,0.5) 0%, rgba(0,20,118,0.5) 100%);">
          +
        </button>
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Nama</div>
          <div class="w-[25%]">Total</div>
          <div class="w-[25%]">Status</div>
          <div class="w-[10%] text-right">Aksi</div>
        </div>
        
        <!-- Table Data Row -->
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[5%] text-[#181411]">#</div>
          <div class="w-[25%] text-[#635549]">Lorem Ipsum</div>
          <div class="w-[25%] text-[#181411]">Rp 95.000</div>
          <div class="w-[25%]">
            <div class="bg-[#dcfce7] rounded-full px-2.5 py-1.5 flex items-center gap-1.5 w-fit">
              <div class="w-1.5 h-1.5 rounded-full bg-[#16a34a]"></div>
              <span class="text-[#166534] text-xs font-medium">Selesai</span>
            </div>
          </div>
          <div class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</div>
        </div>
      </div>
    </div>

    <!-- Table Card 2: Tabel HPP -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Tabel HPP</h3>
        <button class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity"
                style="background: radial-gradient(circle, rgba(177,117,251,0.5) 0%, rgba(0,20,118,0.5) 100%);">
          +
        </button>
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Nama</div>
          <div class="w-[25%]">Total</div>
          <div class="w-[25%]">Status</div>
          <div class="w-[10%] text-right">Aksi</div>
        </div>
        
        <!-- Table Data Row -->
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[5%] text-[#181411]">#</div>
          <div class="w-[25%] text-[#635549]">Lorem Ipsum</div>
          <div class="w-[25%] text-[#181411]">Rp 95.000</div>
          <div class="w-[25%]">
            <div class="bg-[#dcfce7] rounded-full px-2.5 py-1.5 flex items-center gap-1.5 w-fit">
              <div class="w-1.5 h-1.5 rounded-full bg-[#16a34a]"></div>
              <span class="text-[#166534] text-xs font-medium">Selesai</span>
            </div>
          </div>
          <div class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</div>
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