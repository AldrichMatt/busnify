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
      <a href='/dashboard' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Dashboard
      </a>
      <a href='/akun' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Akun & Jurnal
      </a>
      <a href='/stock' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Stock
      </a>
      <a href='/menus' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Menus
      </a>
      <a href='/bahan' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Bahan & Resep
      </a>
      <a href='/sales' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
        Input Penjualan
      </a>
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