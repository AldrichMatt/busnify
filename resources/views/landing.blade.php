<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing</title>
  <x-style />
</head>
<body>
  <!-- Header Section: Navigation and Logo -->
<x-header />
  <!-- Hero Section: Business Name -->
<section id="hero" class="w-full py-12 text-center">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-5xl md:text-6xl font-serif text-black mb-8">
      Welcome, Aldrich
    </h2>
  </div>
</section>
  <!-- Stats Section: Cards displaying financial metrics -->
<section id="stats" class="w-full pb-12 px-6 md:px-12 lg:px-20">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <x-card title="Rp 1.757.000" subtitle="Total Saldo Akun" caption="+36% dari 7 Jan 2026"/>
    <x-card title="120 menu" subtitle="Penjualan" caption="+36% dari 7 Jan 2026"/>
    <x-card title="Ayam Suwir" subtitle="Menu Terlaris" caption="+50 penjualan dari 7 Jan 2026"/>

  </div>
</section>
<!-- Menu Section: Quick Access Buttons -->
<section id="menu" class="w-full pb-20 px-6 md:px-12 lg:px-20">
  <div class="max-w-7xl mx-auto">
    <h3 class="text-2xl font-medium text-black mb-8">Menu Cepat</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
      <x-quick-btn link="/dashboard" label="Dashboard" />
      <x-quick-btn link="/akun" label="Akun & Jurnal" />
      <x-quick-btn link="/stock" label="Stock" />
      <x-quick-btn link="/menus" label="Menus" />
      <x-quick-btn link="/bahan" label="Bahan & Resep" />
      <x-quick-btn link="/sales" label="Input Penjualan" />
    </div>
  </div>
</section>
<!-- Jurnal Section: Table -->
<section id="jurnal" class="w-full pb-20 px-6 md:px-12 lg:px-20">
  <div class="max-w-7xl mx-auto">
  <h3 class="text-2xl font-medium text-black mb-8">Jurnal</h3>
<!-- Table Content -->
  <div class="w-full flex flex-col">
    <!-- Table Header Row -->
    <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
      <div class="w-[5%]">Ref</div>
      <div class="w-[25%]">Nama</div>
      <div class="w-[25%]">Debit</div>
      <div class="w-[25%]">Kredit</div>
      <div class="w-[25%]">Uraian</div>
      <div class="w-[25%]">Tujuan</div>
      <div class="w-[10%] text-right">Aksi</div>
    </div>
    @foreach ($dataJurnal as $itemJurnal)
    <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
      <div class="w-[5%] text-[#181411]">{{ $itemJurnal->kode }}</div>
      <div class="w-[25%] text-[#635549]">{{ $itemJurnal->akun->nama }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->debit_rupiah }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->kredit_rupiah }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->uraian }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->tujuan }}</div>
      <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
    </div>
    @endforeach
  </div>
  </div>
</section>


  <!-- Footer Section: Simple copyright -->
  <section id="footer" class="w-full py-6 text-center border-t border-gray-200/20">
  <p class="text-gray-500 text-sm">&copy; 2025 Busnify. All rights reserved.</p>
  </section>

<script>
  document.body.classList.add('bg-gradient-to-b', 'from-[#B175FB]', 'to-[#ECECEC]', 'min-h-screen', 'font-sans');
</script>
</body>
</html>