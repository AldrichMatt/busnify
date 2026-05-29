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
    
    <!-- Page Title -->
    <h2 class="text-white text-4xl md:text-5xl font-medium">
      Bahan & Resep
    </h2>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
<section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
    
    <x-card title="Lorem" subtitle="lorem" caption="lorem"/>
    <x-card title="Lorem" subtitle="lorem" caption="lorem"/>
    <x-card title="Lorem" subtitle="lorem" caption="lorem"/>

  </div>
</section>
  <!-- Tables Section -->
<section id="tables" class="w-full pb-20">
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
        @foreach ($allBahan as $bahan)
        <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
          <div class="w-[5%] text-[#181411]">{{ $bahan->id }}</div>
          <div class="w-[25%] text-[#635549]">{{ $bahan->nama }}</div>
          <div class="w-[25%] text-[#635549]">{{ $bahan->jumlah }} {{ $bahan->satuan }}</div>
          <div class="w-[25%] text-[#635549]">{{ rupiah($bahan->harga) }}/{{$bahan->satuan}}</div>
          <div class="w-[25%] text-end flex row justify-end gap-2">
            <x-modalEditBahan :bahan="$bahan" modal_id="editBahan{{ $bahan->id }}" />
            <x-edit-button modal_id="editBahan{{ $bahan->id }}" />
            <x-delete-button link="/bahan/delete/{{ $bahan->id }}" />
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