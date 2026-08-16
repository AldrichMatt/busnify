<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Page</title>
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
  <!-- Hero Section: Back Button and Page Title -->
<section class="w-full pb-20 pt-10">
  <section id="hero" class="w-full">
    <div class="mx-20 flex flex-col gap-8">
      <!-- Back Button -->
      <a href="/akun" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
        <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
        <span class="text-white text-sm font-medium">Back</span>
      </a>
    </div>
  </section>
    <!-- Tables Section -->
  <section id="tables" class="w-full pb-20">
    <div class="mx-auto px-20 flex flex-col gap-4">
      
      <!-- Table Card 1 -->
      <div class="bg-white rounded-xl py-3 w-full">
        <!-- Card Header -->
        <div class="flex justify-between items-center px-10 mb-3">
          <h3 class="text-black text-4xl font-bold">Pengaturan Akun</h3>
          <div class="flex flex-row gap-4">
          </div>
        </div>
        
        <!-- Table Content -->
        <div class="w-full flex flex-col">
          <!-- Table Header Row -->
          <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
            <div class="w-[25%]">Nama</div>
            <div class="w-[25%]">Deskripsi</div>
            <div class="w-[25%] text-start">Kode</div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[0] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - menyimpan dana hasil penjualan </br> - memotong dana untuk membeli bahan</div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('KAS_BESAR',this.value)">
                @if ($pengaturan['KAS_BESAR'] != null && $pengaturan['KAS_BESAR']->akun != null)
                  <option value="{{ $pengaturan['KAS_BESAR']->value }}" selected>#{{ $pengaturan['KAS_BESAR']->value }} {{ $pengaturan['KAS_BESAR']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($aset as $akun)
                  <option value="{{ $akun->kode }}"> #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[1] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - mencatat nilai uang barang barang </br> - ditambah ketika membeli barang dan bahan </br> - dikurang ketika ada barang/bahan terbuang</div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('PERSEDIAAN',this.value)">
                @if ($pengaturan['PERSEDIAAN'] != null && $pengaturan['PERSEDIAAN']->akun != null)
                  <option value="{{ $pengaturan['PERSEDIAAN']->value }}" selected>#{{ $pengaturan['PERSEDIAAN']->value }} {{ $pengaturan['PERSEDIAAN']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($aset as $akun)
                  <option value="{{ $akun->kode }}">  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[2] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - ? </br> - ?</div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('MODAL',this.value)">
                @if ($pengaturan['MODAL'] != null && $pengaturan['MODAL']->akun != null)
                  <option value="{{ $pengaturan['MODAL']->value }}" selected>#{{ $pengaturan['MODAL']->value }} {{ $pengaturan['MODAL']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($modal as $akun)
                  <option value="{{ $akun->kode }}">  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[3] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - mencatat ketika terdapat jualan </div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('PENJUALAN',this.value)">
                @if ($pengaturan['PENJUALAN'] != null && $pengaturan['PENJUALAN']->akun != null)
                  <option value="{{ $pengaturan['PENJUALAN']->value }}" selected>#{{ $pengaturan['PENJUALAN']->value }} {{ $pengaturan['PENJUALAN']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($pendapatan as $akun)
                  <option value="{{ $akun->kode }}">  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[4] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - mencatat total pengeluaran untuk pembelian bahan baku </div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('HPP',this.value)">
                @if ($pengaturan['HPP'] != null && $pengaturan['HPP']->akun != null)
                  <option value="{{ $pengaturan['HPP']->value }}" selected>#{{ $pengaturan['HPP']->value }} {{ $pengaturan['HPP']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($beban as $akun)
                  <option value="{{ $akun->kode }}">  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[5] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - mencatat total nilai uang yang terbuang jika ada bahan/barang rusak </div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('WASTE',this.value)">
                @if ($pengaturan['WASTE'] != null && $pengaturan['WASTE']->akun != null)
                  <option value="{{ $pengaturan['WASTE']->value }}" selected>#{{ $pengaturan['WASTE']->value }} {{ $pengaturan['WASTE']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($beban as $akun)
                  <option value="{{ $akun->kode }}">  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[25%] text-[#635549]">{{ $keys[6] }}</div>
            <div class="w-[25%] text-gray-600 text-xs">Akun untuk</br> - mencatat jumlah utang </div>
            <div class="w-[25%] text-[#181411]">
              <select class="w-52" name="" id="" onchange="updatePengaturan('UTANG',this.value)">
                @if ($pengaturan['UTANG'] != null && $pengaturan['UTANG']->akun != null)
                  <option value="{{ $pengaturan['UTANG']->value }}" selected>#{{ $pengaturan['UTANG']->value }} {{ $pengaturan['UTANG']->akun->nama }} </option>
                @else
                  <option value="">----</option>
                @endif
                @foreach ($utang as $akun)
                  <option value="{{ $akun->kode }}"> #{{ $akun->kode }}  #{{ $akun->kode }} {{ $akun->nama }} </option>
                @endforeach
              </select>
            </div>
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

</body>
<script>
  feather.replace();
  async function updatePengaturan(key, value){
    if(value == ''){
      return;
    }
    try {
      await fetch('/akun/pengaturan/set',{
        method : "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body : JSON.stringify({
          nama : key,
          kode : value
        })
      });
      // location.reload();
    } catch (error) {
      console.log('Server response:', error);
    }
  }
</script>
</html>