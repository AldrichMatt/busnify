<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Penjualan</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <h2 class="text-white text-4xl font-medium">
      Penjualan
    </h2>
  </div>
</section>
<x-todo text="fitur cetak struk detailPenjualan"/>
  <!-- Stats Section: 3 Summary Cards -->
{{-- <section id="stats" class="w-full py-6">
  <div class="mx-auto px-20 pb-4 grid grid-cols-1 md:grid-cols-3 gap-4">  
    <x-card title="Ayam Suwir" subtitle="Menu Terlaris" caption="+50 penjualan dalam 1 minggu terakhir" />
  </div>
</section> --}}

<section class="w-full py-6">
  <div class="mx-20 bg-white rounded-xl border-2 border-[#8c8c8c] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">

    <div class="flex justify-between items-center pt-3 px-10">
        <div class="text-[#1e1e1e] text-3xl font-bold mb-4">
            Tambah Penjualan
        </div>

        <button type="button" onclick="">
            <i data-feather="chevron-down" class="w-7 h-7 text-[#1e1e1e]"></i>
        </button>
    </div>
    <div class="flex flex-row justify-b">
      <div class="flex flex-col gap-2 grow py-4 px-3 bg-white">
          <h2 class="text-[#1e1e1e] text-md font-medium pl-4">
            Keranjang
          </h2>
          <div class="w-full flex flex-row justify-items-start gap-2 pl-4">
            <label class="text-black w-[25%]">Nama Cust</label>
            <input class="w-full border-b border-[#8c8c8c] focus:outline-none flex items-center h-full text-sm bg-transparent px-2" 
                  type="text"
                  id="nama-cust"
                  oninput="document.getElementById('warning-user').classList.add('hidden')
                  unlockSubmit()"
                  required>
            </div>
            <label class="warning-user hidden text-red-500 text-sm pl-4" id="warning-user">Masukkan nama customer</label>
          <!-- Table Header Row -->
          <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] font-normal rounded-t-lg border border-gray-100">
            <div class="w-[5%]">#</div>
            <div class="w-[25%]">Nama Menu</div>
            <div class="w-[25%]">Harga</div>
            <div class="w-[25%]">Jumlah</div>
            <div class="w-[10%] text-end">Aksi</div>
          </div>
          <div class="w-full max-h-[275px] overflow-y-scroll odd:bg-white even:bg-gray-200" id="keranjang">

          </div>

          <div class="flex flex-col">
            <div class="w-[50%] py-2 flex flex-row justify-items-start gap-2 pl-4">
              <label class="text-black w-[25%]">Charge</label>
              <input class="w-[50%] border-b border-[#8c8c8c] focus:outline-none flex items-center h-full text-sm bg-transparent px-2" 
                    type="text"
                    value='Rp 0'
                    oninput="formatRupiah(this, 'charge')">
              <input type="hidden" name="charge" id="charge">
            </div>
            <div class="w-[50%] py-2 flex flex-row justify-items-start gap-2 pl-4">
              <label class="text-black w-[25%]">Ongkos Kirim</label>
              <input class="w-[50%] border-b border-[#8c8c8c] focus:outline-none flex items-center h-full text-sm bg-transparent px-2" 
                    type="text"
                    value='Rp 0'
                    oninput="formatRupiah(this, 'ongkir')">
              <input type="hidden" name="ongkir" id="ongkir">
            </div>
            <div class="w-[50%] py-2 flex flex-row justify-items-start gap-2 pl-4">
              <label class="text-black w-[25%]">Metode</label>
              <select name="metode" id="metode">
                <option value="transfer">Transfer</option>
                <option value="cash">Cash</option>
              </select>
            </div>
            <div class="w-[50%] py-4 flex flex-row justify-items-start gap-2 pl-4">
              <label class="text-black text-xl font-bold w-[25%]">Total</label>
              <span 
              id="teks-total"
              class="w-[50%] flex font-bold text-xl items-center h-full bg-transparent px-2">
                Rp
              </span>
              <input type="hidden" name="total" id="total">
            </div>
            <div class="w-[50%] flex flex-row justify-items-start gap-2">
            <button
              type="button"
              onclick="submitForm(event)"
              id="tombol-submit"
              class="inline-flex w-[75%] justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 mx-3 my-2 text-sm font-semibold text-white hover:opacity-50
              disabled:cursor-not-allowed
              disabled:opacity-50"
              disabled
              >
              Catat Pesanan
            </button>
          </div>
          </div>
        </div>
      <div class="flex flex-col gap-2 grow py-4 px-3 bg-white">
        <label class="text-[#1e1e1e] text-md font-medium px-10">Menu</label>
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] font-normal rounded-t-lg border border-gray-100">
            <div class="w-[5%]">#</div>
            <div class="w-[25%]">Nama Menu</div>
            <div class="w-[25%]">Harga Satuan</div>
            <div class="w-[25%]">Jumlah</div>
            <div class="w-[10%] text-end"></div>
          </div>
          <div class="tempat-bahan w-full max-h-68.75 overflow-y-scroll">
            <!-- Table Data Row -->
            @foreach ($dataMenu as $id => $menu)
            @php
              $id += 1
            @endphp
            <div class="
            odd:bg-white even:bg-gray-200
            flex justify-between items-center px-6 py-3 text-[#635549] font-normal
            bg-white border-t text-start border-gray-100">
            <div class="w-[5%] text-[#635549]">{{ $id }}</div>
            <div class="nama-bahan w-[25%] text-[#635549]">{{ $menu->nama }}</div>
            <div class="w-[25%] text-[#635549]">{{ $menu->harga_rupiah }}</div>
            <div class="w-[25%] text-[#635549] px-4 flex flex-row">
              <div class="w-8 border-y-2 border-l-2 rounded-l-2xl border-[#B175FB] text-center">
                <button onclick="kurangJumlah('jumlah{{ $id }}')">
                  - {{-- button --}}
                </button>
              </div>
              <div class="w-8 border-y-2 border-[#B175FB] text-center">
                {{-- <input 
                type="hidden" 
                name="jumlah" 
                id="jumlah{{ $id }}"
                > {{-- input --}} 
                <input
                    type="number"
                    name="jumlah"
                    id="jumlah{{ $id }}"
                    value="0"
                    min="0"
                    class="w-12 bg-transparent text-center outline-none appearance-none"
                />
              </input>
              </div>
              <div class="w-8 border-y-2 border-r-2 rounded-r-2xl border-[#B175FB] text-center">
                <button onclick="tambahJumlah('jumlah{{ $id }}')">
                  + {{-- button --}}
                </button>
              </div>
            </div>
            <div class="w-[10%] text-[#635549] flex row text-end justify-end">
              <button
                class="pr-1 w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity"
                style="background: radial-gradient(circle, rgba(177,117,251,0.5) 0%, rgba(0,20,118,0.5) 100%);"
                onclick="tambahKeranjang({{ $menu }},{{ $id }})"
                >
                <i data-feather="shopping-cart" class="text-white"></i>
              </button>
            </div>
          </div>
          @endforeach
          </div>       
      </div>        
      </div>
      
    </div>
</div>
</section>
  <!-- Tables Section -->
<section id="tables" class="w-full pb-20">
  <div class="mx-auto px-20 flex flex-col gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-black text-4xl font-bold">Catatan Penjualan</h3>
      </div>

      {{-- @dd($dataPenjualan) --}}
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[5%]">Id</div>
          <div class="w-[25%]">Tanggal</div>
          <div class="w-[25%]">Nama Cust</div>
          <div class="w-[25%]">Total</div>
          <div class="w-[25%]">Metode Pembayaran</div>
          <div class="w-[10%] text-right">Detail</div>
        </div>
        
        <!-- Table Data Row -->
        @foreach ($dataPenjualan as $penjualan)
          <div class="bg-white flex justify-between odd:bg-white even:bg-gray-200 items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[5%] text-[#181411]">{{ $penjualan->id }}</div>
            <div class="w-[25%] text-[#635549]">{{ date_format($penjualan->created_at, 'D, d M Y') }}</div>
            <div class="w-[25%] text-[#635549]">{{ $penjualan->nama_cust }}</div>
            <div class="w-[25%] text-[#181411]">Rp {{ number_format($penjualan->total, 0, '.', ',') }}</div>
            <div class="w-[25%] text-[#181411]">{{ $penjualan->metode }}</div>
            <a href='sales/{{ $penjualan->id }}' class="w-[10%] text-right text-[#3b3b3b] cursor-pointer hover:underline">Detail</a>
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
  let indexKeranjang = 1;

  let keranjang = document.getElementById('keranjang');

  keranjang.addEventListener('click', function(e){
    if(e.target.classList.contains('hapus-btn')){
      e.target.closest('.keranjang-row').remove();
      totalKeranjang();
    }
  });

  function formatRupiah(element, targetId) {
    let angka = element.value.replace(/[^0-9]/g, '');
    let target = document.getElementById(targetId)

    if(angka == ''){
      element.value = 'Rp ';
      target.value = 0;
      totalKeranjang();
      return;
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
    target.value = angka;
    totalKeranjang();
  }

  function tambahJumlah(id) {
    const input = document.getElementById(id);
    input.value = Number(input.value || 0) + 1;
  }

  function unlockSubmit(){
    let nama = document.getElementById('nama-cust').value
    if(nama == ''){
      document.getElementById('tombol-submit').disabled = true;
      return;
    }
    document.getElementById('tombol-submit').disabled = false;
    return 
  }

  function kurangJumlah(id) {
      const input = document.getElementById(id);

      if (!input) return;

      const nilai = Number(input.value || 0);

      if (nilai => 1) {
          input.value = nilai - 1;
          totalKeranjang();
          return;
      }
      
      // if(nilai == 1){ 
      //   // input.closest('.keranjang-row').remove();
      //   totalKeranjang();
      //   return;
      // }
  }

  function tambahKeranjang(menu, id){
    const keranjang = document.getElementById('keranjang');
    let jumlahMenu = document.getElementById(`jumlah${id}`).value;
    let row = document.querySelector(`.item-${id}`);
    
    unlockSubmit();
    console.log(jumlahMenu);
    
    if(jumlahMenu == 0){
      document.getElementById('tombol-submit').disabled = true;
      return;
    }
    

    if(row != null){
      let jumlahKeranjang = document.getElementById(`jumlahKeranjang${id}`);
      
      jumlahKeranjang.value = Number(jumlahKeranjang.value) + Number(jumlahMenu);
      cekHargaBarang(id, menu.harga);
      totalKeranjang();
      return;
    }
    

    keranjang.insertAdjacentHTML('beforeend',`
      <div class="
          item-${id}
          keranjang-row
          odd:bg-white even:bg-gray-200
          flex justify-between items-center px-6 py-3 text-[#635549] font-normal
          bg-white border-t text-start border-gray-100">
          <div class="w-[5%] text-[#635549]">${indexKeranjang}</div>
          <div class="w-[25%] text-[#635549]">${menu.nama}</div>
          <input type="hidden" class="menu-id" value="${menu.id}"/>
          <input type="hidden" class="barang-id" value="${menu.id_barang}"/>
          <input type="hidden" class="kuantitas" value="${menu.kuantitas}"/>
          <div class="w-[25%] text-[#635549] harga-item-keranjang" id="harga-${id}">Rp ${ (menu.harga * jumlahMenu).toLocaleString('en-US') }</div>
          <div class="w-[25%] text-[#635549] px-4 flex flex-row">
            <div class="w-8 border-y-2 border-l-2 rounded-l-2xl border-[#B175FB] text-center">
              <button onclick="
                kurangJumlah('jumlahKeranjang${id}');
                cekHargaBarang(${id},${menu.harga})
                ">
                - 
              </button>
            </div>
            <div class="w-8 border-y-2 border-[#B175FB] text-center">
              <input
                  type="number"
                  name="jumlah"
                  id="jumlahKeranjang${id}"
                  onfocusout="this.value == 0 ? document.querySelector('.item-${id}').remove() : totalKeranjang(); cekHargaBarang(${id},${menu.harga})"
                  value="${jumlahMenu}"
                  min="0"
                  class="w-12 bg-transparent text-center outline-none appearance-none jumlah-item-keranjang"
              />
            </input>
            </div>
            <div class="w-8 border-y-2 border-r-2 rounded-r-2xl border-[#B175FB] text-center">
              <button onclick="tambahJumlah('jumlahKeranjang${id}');
              cekHargaBarang(${id},${menu.harga})
              ">
                + {{-- button --}}
              </button>
            </div>
          </div>
          <button type="button" class="hapus-btn w-[5%] text-white bg-[#e43838] hover:bg-[#bc4343] p-2 rounded">x</button>
        </div>
    `);
    indexKeranjang += 1;
    totalKeranjang();
  }

  function cekHargaBarang(id, harga)
  {
    let hargaKeranjang = document.getElementById(`harga-${id}`);
    let jumlahKeranjang = document.getElementById(`jumlahKeranjang${id}`);
    
    hargaKeranjang.innerText = 'Rp ' + (harga * Number(jumlahKeranjang.value)).toLocaleString('en-US');
    totalKeranjang();
    return;
  }

  function totalKeranjang()
  {
    let total = 0;

    document.querySelectorAll('.harga-item-keranjang').forEach(item =>{
      total += Number(item.innerText.replace('Rp ', '')
        .replaceAll(',', '') || 0);
    })

    let charge = document.getElementById('charge').value;
    let ongkir = document.getElementById('ongkir').value;

    if(charge){
      total += Number(charge);
    }

    if(ongkir){
      total += Number(ongkir);
    }

    document.getElementById('total').value = total
    document.getElementById('teks-total').innerText = 'Rp ' + total.toLocaleString('en-US')
  }

  function getFormData()
  {
    let nama = document.getElementById('nama-cust').value;

    if(nama == ''){
      document.querySelector('.warning-user').classList.remove('hidden');
      return;
    }

    let metode = document.getElementById('metode').value;
    let charge = Number(document.getElementById('charge').value);
    let ongkir = Number(document.getElementById('ongkir').value);
    let total = Number(document.getElementById('total').value);
    let jumlah_menu = 0;
    let data = {
      nama,
      charge, 
      ongkir, 
      total,
      metode,
      jumlah_menu,
      detail : []
    }
    document.querySelectorAll('.keranjang-row').forEach(item => {
      let id = Number(item.querySelector('.menu-id').value);
      let id_barang = Number(item.querySelector('.barang-id').value);
      let kuantitas = Number(item.querySelector('.kuantitas').value);
      let harga = Number(item.querySelector('.harga-item-keranjang').innerText.replace('Rp ', '').replaceAll(',', ''));
      let jumlah = Number(item.querySelector('.jumlah-item-keranjang').value);
      
      data.detail.push({
        id, id_barang, kuantitas, harga, jumlah
      });

      data.jumlah_menu += 1;
    })
    return data;
  }

  async function submitForm(event)
  {
    document.getElementById('tombol-submit').disabled = true;
    let total = Number(document.getElementById('total').value);
    if(total == 0){
      return;
    }
    let data = getFormData();

    try {
      const res = await fetch(`/sales/add`,{
        method : "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body : JSON.stringify({
          data
        })
      });
      location.reload();
    } catch (error) {
      console.error(error);
    }
  }

  </script>
</body>
</html>