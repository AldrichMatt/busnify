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
<x-modalAkun modal_id="akun" />
<x-modalSettingAkun modal_id="setting-akun" />
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
  <section id="stats" class="w-full py-6">
    <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
      

      <x-card :title="rupiah($totalSaldo)" subtitle='Total Uang Tunai' />
      <x-card :title="rupiah($totalAset)" subtitle='Total Aset' />
      <x-card :title="Rupiah($selisih)" subtitle='Selisih' />

    </div>
  </section>
    <!-- Tables Section -->
  <section id="tables" class="w-full pb-20">
    <div class="mx-auto px-20 flex flex-col gap-4">
      
      <!-- Table Card 1 -->
      <div class="bg-white rounded-xl py-3 w-full">
        <!-- Card Header -->
        <div class="flex justify-between items-center px-10 mb-3">
          <div class="">
            <h3 class="text-black text-4xl font-bold">Akun</h3>
            <h4 class="text-gray-700">
              Atur akun untuk mengelola keuangan, tekan tombol + untuk menambahkan Akun, </br>
              dan tombol pengaturan untuk mengatur Akun mana yang dipakai pada transaksi
            </h4>
          </div>
          <div class="flex flex-row gap-4">
            <a href="/akun/pengaturan"
            class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity
                    bg-gray-500
            ">
                    <i data-feather="settings" class="text-white size-5"></i>
            </a>
            <x-modalAddButton modal_id="akun"/>
          </div>
        </div>
        
        <!-- Table Content -->
        <div class="w-full flex flex-col">
          <!-- Table Header Row -->
          <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
            <div class="w-[5%]">Ref</div>
            <div class="w-[25%]">Nama</div>
            <div class="w-[25%] text-start">Debit</div>
            <div class="w-[25%] text-start">Kredit</div>
            <div class="w-[25%] text-start">Saldo</div>
            <div class="w-[10%] text-right">Aksi</div>
          </div>
          
          <!-- Table Category Row -->
        {{-- all asset disini --}}
          <x-table-category-row label="Aset" />
          @if(isset($allAkun['aset']))
          @foreach ($allAkun['aset'] as $aset)
          
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $aset->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $aset->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $aset->debit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $aset->kredit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ rupiah($aset->debit - $aset->kredit) }}</div>
            <div class="w-[10%] text-end flex row justify-end gap-2">
              <x-delete-button link="/akun/delete/{{ $aset->id }}" />
            </div>
          </div>
          @endforeach
          @else
          @endif
        {{-- all utang disini --}}
          <x-table-category-row label="Utang" />
          @if(isset($allAkun['utang']))
          @foreach ($allAkun['utang'] as $utang)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $utang->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $utang->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $utang->debit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $utang->kredit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ rupiah($utang->kredit - $utang->debit) }}</div>
            <div class="w-[10%] text-end flex row justify-end gap-2">
              <x-delete-button link="/akun/delete/{{ $utang->id }}" />
            </div>
          </div>
          @endforeach
          @else
          @endif
        {{-- all modal disini --}}
          <x-table-category-row label="Ekuitas" />
          @if(isset($allAkun['modal']))
          @foreach ($allAkun['modal'] as $modal)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $modal->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $modal->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $modal->debit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $modal->kredit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ rupiah($modal->kredit - $modal->debit) }}</div>
            <div class="w-[10%] text-end flex row justify-end gap-2">
              <x-delete-button link="/akun/delete/{{ $modal->id }}" />
            </div>
          </div>
          @endforeach
          @else
          @endif
        {{-- all pendapatan disini --}}
        
          <x-table-category-row label="Pendapatan" />
          @if(isset($allAkun['pendapatan']))
          @foreach ($allAkun['pendapatan'] as $pendapatan)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $pendapatan->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $pendapatan->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $pendapatan->debit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $pendapatan->kredit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ rupiah($pendapatan->kredit - $pendapatan->debit) }}</div>
            <div class="w-[10%] text-end flex row justify-end gap-2">
              <x-delete-button link="/akun/delete/{{ $pendapatan->id }}" />
            </div>
          </div>
          @endforeach
          @else
          @endif
        {{-- all beban disini --}}
          <x-table-category-row label="Beban" />
          @if(isset($allAkun['beban']))
          @foreach ($allAkun['beban'] as $beban)
            
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $beban->kode }}</div>
            <div class="w-[25%] text-[#635549]">{{ $beban->nama }}</div>
            <div class="w-[25%] text-[#181411]">{{ $beban->debit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ $beban->kredit_rupiah }}</div>
            <div class="w-[25%] text-[#181411]">{{ rupiah($beban->debit - $beban->kredit) }}</div>
            <div class="w-[10%] text-end flex row justify-end gap-2">
              <x-delete-button link="/akun/delete/{{ $beban->id }}" />
            </div>
          </div>
          @endforeach
          @else
          @endif
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
<script>
  feather.replace();
    const saldo = document.getElementById('saldo');

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
</html>