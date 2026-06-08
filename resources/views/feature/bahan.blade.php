<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bahan</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
<x-modalBahan />
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
  <!-- Stats Section: 3 Summary Cards -->
{{-- <section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 flex flex-col">
    
    <div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-lg font-bold mb-4">Stock Bahan</div>
      <hr class="bg-gray-200 mb-2">
      <div class="flex flex-row gap-2">
        <div class="flex flex-col gap-2 w-full pb-4">
        <label class="text-black text-sm font-normal">Nama Bahan</label>
          <div class="w-full bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
            <select class="w-full h-full outline-none text-sm bg-transparent px-2" 
            name="bahan">
              <option>-------</option>
              @foreach ($allBahan as $bahan)
                <option value="{{ $bahan->id }}">{{ $bahan->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="flex flex-col gap-2 w-full pb-4">
        <label class="text-black text-sm font-normal">Kategori</label>
          <div class="w-full bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
            <select class="w-full h-full outline-none text-sm bg-transparent px-2" 
            name="sumber">
              <option value="pembelian">Pembelian</option>
              <option value="waste">Terbuang</option>
            </select>
          </div>
        </div>
        <div class="flex flex-col justify-items-start gap-2 pl-4">
          <label class="text-black text-sm font-normal">Jumlah</label>
          <div class="w-full bg-white border-b-2 border-[#8c8c8c] py-2 flex items-center">
            <input class="w-full h-full outline-none text-sm bg-transparent" 
                  type="number" name="jumlah" id="jumlah">
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
  <!-- Tables Section -->
<section id="tables" class="w-full pt-4 pb-20">
  <div class="mx-auto px-20 flex flex-row gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 grow h-min flex flex-col ">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Bahan</h3>
        <!-- Plus Button with Radial Gradient -->
        <x-modalAddButton modal_id="bahan"/>
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
            <div class="w-full max-h-80 overflow-y-scroll">
        @foreach ($allBahan as $bahan)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[5%] text-[#181411]">{{ $bahan->id }}</div>
          <div class="w-[25%] text-[#635549]">{{ $bahan->nama }}</div>
          <div class="w-[25%] text-[#635549]">{{ $bahan->jumlah }} {{ $bahan->satuan }}</div>
          <div class="w-[25%] text-[#635549]">{{ rupiah($bahan->harga) }}/{{$bahan->satuan}}</div>
          <div class="w-[25%] text-end flex row justify-end gap-2">
            <x-modalStockBahan :dataBarang="$bahan" modal_id="editStock{{ $bahan->id }}"/>
            <x-modalEditBahan :bahan="$bahan" modal_id="editBahan{{ $bahan->id }}" />
            <x-edit-button modal_id="editBahan{{ $bahan->id }}" />
            <x-stock-button modal_id="editStock{{ $bahan->id }}" />
            <x-delete-button link="/bahan/delete/{{ $bahan->id }}" />
          </div>
        </div>
        @endforeach
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
    feather.replace();

function formatRupiah(element, id) {
   let angka = element.value.replace(/[^0-9]/g, '');

   if(id !== 0){
    saldo = document.getElementById(`harga${id}`);
  }else {
    saldo = document.getElementById(`harga`);  
  }
  
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
  </script>
</body>
</html>