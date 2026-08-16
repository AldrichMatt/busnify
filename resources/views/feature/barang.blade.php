
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
<x-modalBarang />
  <!-- Hero Section: Back Button and Page Title -->
<section class="w-full pb-20 pt-10">
<section id="hero" class="w-full">
  <div class="mx-20 flex flex-col gap-8">
    <!-- Back Button -->
    <a href="/" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
      <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
      <span class="text-white text-sm font-medium">Back</span>
    </a>
  </div>
</section>

<x-todo text="perbaiki HPP agar dapat global, untuk produksi dan restock barang resell"/>
<section id="tables" class="w-full pt-4 pb-20">
  <div class="mx-auto px-20 flex flex-row gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full h-min flex flex-col">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3 py-1 pb-1">
        <div class="">

          <h3 class="text-black text-4xl font-bold">Produk</h3>
          {{-- STOCK MENU BERTAMBAH DARI INPUT PRODUKSI DAN BERKURANG DARI PENJUALAN --}}
          <h4 class="text-gray-700">
            Atur Barang utama yang dipakai untuk menu, jika barang diproduksi masukkan Resep terlebih dahulu agar dapat diproduksi
          </h4>
        </div>
        <x-modalAddButton modal_id="barang" />
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[25%]">Id</div>
          <div class="w-[25%]">Nama Barang</div>
          <div class="w-[25%]">Jumlah</div>
          <div class="w-[25%]">Tipe</div>
          <div class="w-[5%]">Edit</div>
          <div class="w-[5%]">Resep</div>
          <div class="w-[5%]">Stock</div>
        </div>        
        <!-- Table Data Row -->
        @foreach ($dataBarang as $barang)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[25%] text-[#181411]">{{ $barang->id }}</div>
          <div class="w-[25%] text-[#635549]">{{ $barang->nama }}</div>
          <div class="w-[25%] text-[#181411]">{{ $barang->jumlah }}</div>
          <div class="w-[25%] text-[#181411]">{{ $barang->produksi ? "Produksi" : "Resell" }}</div>
          <div class="w-[5%]">
            <x-edit-button modal_id="editBarang{{ $barang->id }}" />
            <x-modalEditBarang :barang="$barang" modal_id="editBarang{{ $barang->id }}"/>
          </div>
          <div class="w-[5%]">
            @if ($barang->produksi)
              <a href='/barang/resep/{{ $barang->id }}'>
                  <button class="bg-[#e49938] hover:bg-[#c68531] p-2 rounded">
                      <i data-feather="list" class="text-white size-5"></i>
                  </button>
              </a>
            @endif
          </div>
          <div class="w-[5%]">
            @if($barang->produksi == 0)
              <x-modalStockBarang :dataBarang="$barang" modal_id="editStock{{ $barang->id }}"/>
              <x-stock-button modal_id="editStock{{ $barang->id }}" />
            @else
              @if ($barang->produksi == 1 && $barang->resep_exists)
              <a href="/barang/produksi/{{ $barang->id }}">
                <button class="bg-[#0d6cf2] hover:bg-[#0f5cc7] p-2 rounded">
                  <i data-feather="package" class="text-white size-5"></i>
                </button>
              </a>
              @else
              <button class="bg-[#5e99ec] p-2 rounded" disabled>
                <i data-feather="package" class="text-white size-5"></i>
              </button>
            @endif
            @endif
          </div>
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