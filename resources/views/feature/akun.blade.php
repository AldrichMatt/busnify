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
{{-- MODAL AKUN --}}
<x-modalAkun />
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
        Akun
      </h2>
    </div>
  </section>
    <!-- Stats Section: 3 Summary Cards -->
  <section id="stats" class="w-full py-6">
    <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
      
      <x-card :title="rupiah($totalSaldo)" subtitle='Total Saldo' />
      @if ($selisih == 0)
        <x-card :title="Rupiah($selisih)" subtitle='Selisih' :caption="$detailSelisih" />
      @else
        <x-card :title="rupiah($selisih)" subtitle='Selisih' :caption="$detailSelisih"  type="danger"/>
      @endif

    </div>
  </section>
    <!-- Tables Section -->
  <section id="tables" class="w-full pb-20">
    <div class="mx-auto px-20 flex flex-col gap-4">
      
      <!-- Table Card 1 -->
      <div class="bg-white rounded-xl py-3 w-full">
        <!-- Card Header -->
        <div class="flex justify-between items-center px-10 mb-3">
          <h3 class="text-black text-4xl font-bold">Akun</h3>
          <x-modalAddButton />
        </div>
        
        <!-- Table Content -->
        <div class="w-full flex flex-col">
          <!-- Table Header Row -->
          <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
            <div class="w-[5%]">Ref</div>
            <div class="w-[25%]">Nama</div>
            <div class="w-[25%]">Debit</div>
            <div class="w-[25%]">Kredit</div>
            <div class="w-[10%] text-right">Aksi</div>
          </div>
          
          <!-- Table Category Row -->
        {{-- all asset disini --}}
          <div class="bg-gradient-to-b from-[#509CF3] to-[#083E7C] flex items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#f8f7f5]">Aset</div>
          </div>
          @foreach ($allAset as $aset)
          
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $aset->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $aset->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $aset->debitrupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $aset->kreditrupiah }}</div>
            <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
          </div>
          @endforeach
        {{-- all utang disini --}}
          <div class="bg-gradient-to-b from-[#509CF3] to-[#083E7C] flex items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#f8f7f5]">Utang</div>
          </div>
          @foreach ($allUtang as $utang)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $utang->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $utang->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $utang->debitrupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $utang->kreditrupiah }}</div>
            <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
          </div>
          @endforeach
        {{-- all modal disini --}}
          <div class="bg-gradient-to-b from-[#509CF3] to-[#083E7C] flex items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#f8f7f5]">Ekuitas</div>
          </div>
          @foreach ($allModal as $modal)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $modal->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $modal->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $modal->debitrupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $modal->kreditrupiah }}</div>
            <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
          </div>
          @endforeach
        {{-- all pendapatan disini --}}
          <div class="bg-gradient-to-b from-[#509CF3] to-[#083E7C] flex items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#f8f7f5]">Pendapatan</div>
          </div>
          @foreach ($allPendapatan as $pendapatan)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $pendapatan->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $pendapatan->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $pendapatan->debitrupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $pendapatan->kreditrupiah }}</div>
            <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
          </div>
          @endforeach
        {{-- all beban disini --}}
          <div class="bg-gradient-to-b from-[#509CF3] to-[#083E7C] flex items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#f8f7f5]">Beban</div>
          </div>
          @foreach ($allBeban as $beban)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $beban->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $beban->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $beban->debitrupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $beban->kreditrupiah }}</div>
            <a href='#' class="w-[10%] text-right text-[#f27f0d] cursor-pointer hover:underline">Edit</a>
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

</body>

</html>