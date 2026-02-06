<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep</title>
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
      Resep
    </h2>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
  <x-todo text="ketika user tambah resep, ambil berapa banyak jumlah bahan
  kirim semua bahan, lalu diloop di controller untuk dimasukkan ke DB 
  masing2 row
  "/>
<section id="stats" class="w-full py-6">
    <div class="mx-20 py-3 my-3 bg-white rounded-xl border-2 border-[#8c8c8c] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4 pt-3 px-10">Tambah Resep</div>
      <div class="flex row justify-b">
        <div class="flex flex-col grow min-w-100">
          <div class="w-full flex flex-col grow ">
            <h2 class="text-[#1e1e1e] text-lg font-medium px-10">
              Pilih Bahan
            </h2>
            <!-- Table Header Row -->
            <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] font-normal rounded-t-lg border border-gray-100">
              <div class="w-[5%]">Id</div>
              <div class="w-[25%]">Nama Bahan</div>
              <div class="w-[25%]">Harga / Satuan</div>
              <div class="w-[25%] text-end">Aksi</div>
            </div>
            <div class="w-full max-h-[275px] overflow-y-scroll">

              <!-- Table Data Row -->
              @foreach ($allBahan as $bahan)
              <div class="
              flex justify-between items-center px-6 py-3 text-[#635549] font-normal
              bg-white border-t text-start border-gray-100">
              <div class="w-[5%] text-[#635549]">{{ $bahan->id }}</div>
              <div class="w-[25%] text-[#635549]">{{ $bahan->nama }}</div>
              <div class="w-[25%] text-[#635549]">{{ $bahan->harga_rupiah }} / {{ $bahan->satuan }}</div>
              <div class="w-[25%] text-[#635549] flex row text-end justify-end">
                <button
                  class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity"
                  style="background: radial-gradient(circle, rgba(177,117,251,0.5) 0%, rgba(0,20,118,0.5) 100%);"
                  onclick="tambahBahan(
                  {{ $bahan }}
                  )"
                  >
                  <i data-feather="plus" class="text-white"></i>
                </button>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-2 grow py-4 px-5 bg-white">
        <label class="text-black text-sm font-normal">Menu</label>
          <div class="flex grow-x bg-white border border-[#8c8c8c] rounded-lg py-2 items-center">
            <select name="id_barang" id=""
            class="w-full outline-none text-sm bg-transparent px-2">
            @foreach ($allMenu as $menu)
            <option value={{ $menu->id }}>{{ $menu->nama }}</option>
            @endforeach
          </select>
        </div>

        <label class="text-black text-sm font-normal">List Bahan</label>
        {{-- tabel bahan resep --}}
        <div class="w-FULL max-h-[200px] overflow-y-scroll" id="bahan_resep">
        </div>
        <button type="submit"
        class="inline-flex w-full justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 text-sm font-semibold text-white hover:opacity-50 sm:w-auto">
        Tambah Resep</button>
      </div>
      </div>
  </div>
</section>
  <!-- Tables Section -->
<section id="tables" class="w-full pb-20 ">
  <div class="mx-auto px-20 flex flex-row gap-4">

    <div class="bg-white rounded-xl py-3 grow h-min flex flex-col ">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Resep</h3>
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Nama Bahan</div>
          <div class="w-[25%]">Jumlah</div>
          <div class="w-[25%]">Harga / Satuan</div>
          <div class="w-[25%] text-end">Aksi</div>
        </div>        
        <!-- Table Data Row -->
        @foreach ($allResep as $resep)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[5%] text-[#181411]"></div>
          <div class="w-[25%] text-[#635549]"></div>
          <div class="w-[25%] text-[#635549]"></div>
          <div class="w-[25%] text-[#635549]"></div>
          <div class="w-[25%] text-end flex row justify-end gap-2">
            {{-- <x-modalEditBahan :bahan="$bahan" modal_id="editBahan" /> --}}
            <x-edit-button modal_id="editBahan" />
            <x-delete-button link="/bahan/delete/" />
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
    const saldo = document.getElementById('harga');
    const tabelBahan = document.getElementById('bahan_resep');
    let i = 1;

    function formatRupiah(element) {
      let angka = element.value.replace(/[^0-9]/g, '');
    
      let number_string = angka.toString();
      let sisa = number_string.length % 3;
      let rupiah = number_string.substr(0, sisa);
      let ribuan = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
          let separator = sisa ? ',' : '';
          rupiah += separator + ribuan.join(',');
      }

      element.value = 'Rp ' + rupiah;
      saldo.value = angka;
      }

      function filterBahan(bahan){
        if(tabelBahan.textContent.includes(bahan.nama)){
          return false;
        }else{
          return true;
        }
      }
      
      function tambahBahan(bahan) {
        if(filterBahan(bahan)){
          tabelBahan.innerHTML += `
        <div class="
        flex justify-between items-center px-6 py-3 text-[#635549] font-normal
        bg-gray-100 border-t text-start">
        <div class="w-[5%] text-[#635549]">${ i++ }</div>
        <div class="w-[25%] text-[#635549]">${bahan.nama}</div>
        <div class="w-[25%] text-[#635549] flex-row">
                <div class="w-92 bg-white border border-[#8c8c8c] rounded-lg py-2 px-2 flex items-center">
                  <input class="w-full h-full outline-none text-sm bg-transparent"
                  type="number">
                  gr 
                  </div>
                  </div>
                  </div>
                  `
                  
                } 
                console.log(i);
                
              }
      </script>
</body>
</html>