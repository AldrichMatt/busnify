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
<x-modalStockMenu :dataBarang="$dataBarang->menu" />
<x-modalStockBahan :dataBarang="$dataBarang->bahan" />
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
    <h2 class="text-white text-4xl font-medium">
      Stock
    </h2>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
{{-- <section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
    <x-card title="Lorem" subtitle="lorem" caption="" />
    <x-card title="Lorem" subtitle="lorem" caption="" />
    <x-card title="Lorem" subtitle="lorem" caption="" />
  </div>
</section> --}}
  <!-- Tables Section -->
<section id="tables" class="w-full pt-4 pb-20">
  <div class="mx-auto px-20 flex flex-row gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full h-min flex flex-col">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3 py-1 pb-1">
        <h3 class="text-black text-4xl font-bold">Stock Menu</h3>
        {{-- STOCK MENU BERTAMBAH DARI INPUT PRODUKSI DAN BERKURANG DARI PENJUALAN --}}
        {{-- <x-modalAddButton modal_id="stockMenu" /> --}}
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[25%]">Tanggal</div>
          <div class="w-[25%]">Arah</div>
          <div class="w-[25%]">Nama Barang</div>
          <div class="w-[25%]">Jumlah</div>
          <div class="w-[25%]">Tipe</div>
          <div class="w-[25%]">Sumber</div>
          <div class="w-[5%]">Id</div>
        </div>        
        <!-- Table Data Row -->
        @foreach ($dataStockMenu as $stok)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[25%] text-[#635549]">{{ date_format($stok->created_at, "d M Y H:i") }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->arah }}</div>
          <div class="w-[25%] text-[#635549]">{{ $stok->item->nama }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->jumlah }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->item_type }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->sumber }}</div>
          <div class="w-[5%] text-[#181411]">{{ $stok->item_id }}</div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full h-min flex flex-col">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Stock Bahan</h3>
        <x-modalAddButton modal_id="stockBahan" />
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[25%]">Tanggal</div>
          <div class="w-[25%]">Arah</div>
          <div class="w-[25%]">Nama Barang</div>
          <div class="w-[25%]">Jumlah</div>
          <div class="w-[25%]">Tipe</div>
          <div class="w-[25%]">Sumber</div>
          <div class="w-[5%]">Id</div>
        </div>        
        <!-- Table Data Row -->
        @foreach ($dataStockBahan as $stok)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[25%] text-[#635549]">{{ date_format($stok->created_at, "d-M-Y H:i") }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->arah }}</div>
          <div class="w-[25%] text-[#635549]">{{ $stok->item->nama }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->jumlah }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->item_type }}</div>
          <div class="w-[25%] text-[#181411]">{{ $stok->sumber }}</div>
          <div class="w-[5%] text-[#181411]">{{ $stok->item_id }}</div>
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
    feather.replace();
    var akunKananMenu = document.getElementById('akunKananMenu');
    var akunKiriMenu = document.getElementById('akunKiriMenu');
    var akunKananBahan = document.getElementById('akunKananBahan');
    var akunKiriBahan = document.getElementById('akunKiriBahan');

    document.querySelectorAll('input[id="sumberBahan"]').forEach(radio => {
        radio.addEventListener('change', e => {
            fetchAkun(e.target.value, 'bahan');
        });
    });

    document.querySelectorAll('input[id="sumberMenu"]').forEach(radio => {
        radio.addEventListener('change', e => {
            fetchAkun(e.target.value, "menu");
        });
    });

    function fetchAkun(kategori, tipe){
      fetch(`/fetch/akun/${encodeURIComponent(kategori)}`)
          .then(res => res.json())
          .then(data => renderAkun(data, tipe));
    }
    function renderAkun(data, tipe){
      let kanan = '';
      let kiri = '';

      data.kanan.forEach(data => {
        kanan += 
        `
          <option value=${data.kode}>
            #${data.kode} ${data.nama}
          </option>
        `
      });

      data.kiri.forEach(data => {
        kiri += 
        `
          <option value=${data.kode}>
            #${data.kode} ${data.nama}
          </option>
        `
      });

      switch(tipe){
        case "menu" : 
          akunKananMenu.innerHTML = kanan;
          akunKiriMenu.innerHTML = kiri;
        break;

        case "bahan" : 
          akunKananBahan.innerHTML = kanan;
          akunKiriBahan.innerHTML = kiri;
          break;
        default : 
        break;
      }

    }
</script>
  </script>
</body>
</html>