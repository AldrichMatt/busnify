<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing</title>
  <x-style />
</head>
<body>  <!-- Header Section: Navigation and Logo -->
<x-header />

<!-- Menu Section: Quick Access Buttons -->
<section id="menu" class="w-full pb-10 px-6 md:px-12 lg:px-20">
  <div class="max-w-7xl mx-auto">
    <h3 class="text-2xl font-medium text-black mb-8">Menu Cepat</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
      {{-- <x-quick-btn link="/dashboard" label="Dashboard" /> --}}
      <x-quick-btn link="/akun" label="Akun" />
      <x-quick-btn link="/barang" label="Produk" />
      <x-quick-btn link="/menus" label="Katalog" />
      <x-quick-btn link="/bahan" label="Bahan" />
      <x-quick-btn link="/resep" label="Resep" />
      <x-quick-btn link="/produksi" label="Produksi" />
      <x-quick-btn link="/hpp" label="Laporan HPP" />
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
      <div class="w-[25%]">Waktu</div>
      <div class="w-[25%]">Akun</div>
      <div class="w-[25%]">Debit</div>
      <div class="w-[25%]">Akun</div>
      <div class="w-[25%]">Kredit</div>
      <div class="w-[25%]">Uraian</div>
      <div class="w-[25%]">Tujuan</div>
    </div>
    @foreach ($dataJurnal as $itemJurnal)

    {{-- @dd($itemJurnal) --}}
    
    <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
      <div class="w-[25%] text-[#181411]">{{ date_format($itemJurnal->kiri->created_at, 'D, d M y H:i') }}</div>
      @if ($itemJurnal->kiri->akun->deleted_at !== null)
        <div class="w-[25%] text-[#e43838]">
        @else
        <div class="w-[25%] text-[#181411]">
        @endif
      #{{ $itemJurnal->kiri->kode }} {{ $itemJurnal->kiri->akun->nama }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->kiri->debit_rupiah }}</div>
      @if ($itemJurnal->kanan->akun->deleted_at !== null)
        <div class="w-[25%] text-[#e43838]">
        @else
        <div class="w-[25%] text-[#181411]">
        @endif
      #{{ $itemJurnal->kanan->kode }} {{ $itemJurnal->kanan->akun->nama }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->kanan->kredit_rupiah }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->kiri->uraian }}</div>
      <div class="w-[25%] text-[#181411]">{{ $itemJurnal->kiri->tujuan }}</div>
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