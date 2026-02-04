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
<section id="stats" class="w-full py-6">
    <div class="mx-20 py-3 bg-white rounded-xl border-2 border-[#8c8c8c] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4 px-10">Tambah Resep</div>
      <div class="px-6">
        <x-input-field name="takaran" label="Takaran" type="number" />
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
        <!-- Plus Button with Radial Gradient -->
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
            <x-modalEditBahan :bahan="$bahan" modal_id="editBahan" />
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
  </script>
</body>
</html>