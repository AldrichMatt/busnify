<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produksi</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
{{-- @dd($dataMenu) --}}
{{-- <x-modalProduksi :dataMenu="$dataMenu" :dataResep="$dataResep"/> --}}
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
                Produksi
            </h2>
        </div>
    </section>
<x-todo text="hubungkan produksi ke stock juga ini how plis..."/>

<section id="stats" class="w-full py-3">
  <div class="mx-auto px-20 grid grid-cols-1 md:grid-cols-3 gap-4">
    
    <x-card title="Lorem" subtitle="lorem" caption="" />
    <x-card title="Lorem" subtitle="lorem" caption="" />
    <x-card title="Lorem" subtitle="lorem" caption="" />

  </div>
</section>

<section id="stats" class="w-full py-3">
    <div class="mx-20 py-3 my-3 bg-white rounded-xl border-2 border-[#8c8c8c] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4 pt-3 px-10">Tambah Resep</div>
      <div class="flex row justify-b">
        <div class="flex flex-col gap-2 grow py-4 px-5 bg-white">
          <label class="text-black text-sm font-normal">Menu</label>
          <div class="flex grow-x bg-white border border-[#8c8c8c] rounded-lg py-2 items-center">
            <select name="id_barang" 
            id="menu"
            onchange="fetchBahan()" {{-- HERE HERE --}}
            class="idBarang w-full outline-none text-sm bg-transparent px-2">
            <option selected value="0">------</option>
            @foreach ($dataMenu as $menu)
            <option value={{ $menu->id }}>{{ $menu->nama }}</option>
            @endforeach
            </select>
          </div>         
        </div>
        <div class="flex flex-col grow min-w-100">
          <div class="w-full flex flex-col grow ">
            <h2 class="text-[#1e1e1e] text-lg font-medium px-10">
              Pilih Bahan
            </h2>
            <!-- Table Header Row -->
            <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] font-normal rounded-t-lg border border-gray-100">
              <div class="w-[5%]">Id</div>
              <div class="w-[25%]">Nama Bahan</div>
              <div class="w-[15%]">Stock</div>
              <div class="w-[15%] text-center">Pakai Stock</div>
              <div class="w-[15%]">Takaran</div>
              <div class="w-[15%]">Harga</div>
            </div>
            <div class="w-full max-h-[275px] overflow-y-scroll" id="tempat_bahan">
            </div>
          </div>
          
        </div>
      </div>
        <button
          type="button"
          onclick="submitForm(event)"
          class="inline-flex w-[25%] justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 mx-3 my-2 text-sm font-semibold text-white hover:opacity-50">
          Catat Produksi
          </button>
  </div>
</section>

{{-- Table Section --}}
<section id="tables" class="w-full pt-3 pb-10">
  <div class="mx-auto px-20 flex flex-col gap-4">
    
    <!-- Table Card 1 -->
    <div class="bg-white rounded-xl py-3 w-full">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 mb-3">
        <h3 class="text-[#1e1e1e] text-3xl font-bold mb-4 pt-3">Log Produksi</h3>
      </div>
      
      <!-- Table Content -->
        <div class="w-full flex flex-col">


          {{-- Tabel bahan --}}
          <!-- Table Header Row -->
          <div class="bg-gray-300 flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
            <div class="w-[25%]">Batch No.</div>
            <div class="w-[25%]">Nama Barang</div>
            <div class="w-[25%]">Tanggal Produksi</div>
            <div class="w-[25%] text-right">Aksi</div>
          </div>
          <!-- Table Data Row -->
          <div class="flex flex-col max-h-64 overflow-y-scroll">
            @foreach($dataProduksi as $produksi)
            <div class="odd:bg-white even:bg-gray-200 flex justify-between items-center px-6 py-4 border-t border-gray-100">
              <div class="w-[25%] text-[#635549]">{{ $produksi->id_batch }}</div>
              <div class="w-[25%] text-[#635549]">{{ $produksi->barang->nama }}</div>
              <div class="w-[25%] text-[#635549]">{{ date_format($produksi->created_at, 'D, d M y H:i') }}</div>
              <a href='/produksi/{{ $produksi->id }}' class="w-[25%] text-right text-[#635549] cursor-pointer hover:underline">Detail</a>
            </div>
            @endforeach
          </div>
        </div>
    </div>

  </div>
</section>
<section id="footer" class="py-4 text-center text-white/50 text-sm">
  <p>&copy; 2025 Busnify. All rights reserved.</p>
</section>
</body>
<script>
  feather.replace();

  // ambil bahan dalam resep pada menu yang dipilih
  async function fetchBahan()
  {
    let menuId = document.getElementById('menu').value

    if(menuId == 0){
      let tempatBahan = document.getElementById('tempat_bahan')
      tempatBahan.innerHTML = ``;
    } else{
      try {
          fetch(`/fetch/resep/${encodeURIComponent(menuId)}`)
          .then(res => res.json())
          .then(data => showResep(menuId, data));
      } catch (error) {
        console.error(error)
      }
    }
    
  }

  function showResep(idBarang, data)
  {
    let tempatBahan = document.getElementById('tempat_bahan')
    tempatBahan.innerHTML = ``;
    let i = 1;
    data.forEach(item => {    
      tempatBahan.insertAdjacentHTML('beforeend', `
        <div class="bahan-row
        flex justify-between items-center px-6 py-3 text-[#635549] font-normal
        bg-gray-100 border-t text-start" id="bahan${ i }">
            <div class="w-[5%] text-[#635549]">
              <input 
              class="bahanId"
              type="hidden"
              value = ${item.bahan.id}
              />
              ${ i }
            </div>
            <div class="w-[25%] text-[#635549]">${item.bahan.nama}</div>
            <div 
              class="w-[15%] 
              text-center 
              text-[#635549]"
              id="stock${i}"  
            >
            ${item.bahan.jumlah} ${item.bahan.satuan}
            </div>

            <div class="w-[25%] text-center text-[#635549]">
              <input 
                type="checkbox" 
                class="pakaiStock" 
                onchange="cekStock(${i})"
                ${item.bahan.jumlah <= 0 ? 'disabled' : ''}
              />
            </div>

            
            <div class="w-[15%] text-[#635549] flex-row">
              <div class="w-full bg-white border border-[#8c8c8c] rounded-lg py-2 px-2 flex items-center">
                <input 
                  class="bahanQty w-full h-full outline-none text-sm bg-transparent"
                  type="number"
                  id="qty${i}"
                  value="${item.takaran}"
                  oninput="cek"
                  required
                >
                ${item.bahan.satuan}
                </div>
              </div>
              <div 
                class="w-[15%] flex items-center
                bg-white 
                border border-[#8c8c8c] 
                rounded-lg 
                py-2 px-2"
              >
                Rp
                <input 
                  class="w-full ps-2 h-full 
                  outline-none 
                  text-sm bg-transparent"
                  type="text"
                  id="hargaBahan${i}"
                  value="${item.takaran*item.bahan.harga}"
                  oninput="formatRupiah(this,${ i })"
                />
                <input 
                  class="bahanHarga"
                  type="hidden"
                  name="harga"
                  id="harga${ i }"
                  value=${item.takaran*item.bahan.harga}
                />
            </div>
          </div>
          `);
            // console.log(i);
      formatRupiah(document.getElementById(`hargaBahan${i}`),i);
      i++;      
      }
    );

  }

  function formatRupiah(element, id) 
  {
    let angka = element.value.replace(/[^0-9]/g, '');

    let saldo = document.getElementById(`harga${id}`);
  
    let number_string = angka.toString();
    let sisa = number_string.length % 3;
    let rupiah = number_string.substr(0, sisa);
    let ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }
    element.value = rupiah;
    saldo.value = angka;
  }

  function getFormData()
  {
    let menuId = document.querySelector('.idBarang').value;

    if(menuId == 0){
      return;
    }
    

    let dataBahan = {
      menuId,
      detail : []
      };        

    let total = 0;

    document.querySelectorAll('.bahan-row').forEach(row => {
      let id = row.querySelector('.bahanId').value;
      let qty = row.querySelector('.bahanQty').value;
      let harga = row.querySelector('.bahanHarga').value;
      let stock = row.querySelector('.pakaiStock').checked;
      
      total += Number(harga)  ;

      dataBahan.detail.push({
        id : Number(id),
        takaran : Number(qty),
        harga : Number(harga),
        stock
      });

    });

    // console.log(total);
    
    dataBahan.total = total; 
              
    return dataBahan;
  }

  async function submitForm(e)
  {
    e.preventDefault();
    let formData = getFormData();

    if(!formData){
      return;
    }

    try {
      const res = await fetch(`/produksi/add`,{
            method : "POST",
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body : JSON.stringify({
              detail : formData
            })
          });

          location.reload();
    } catch (error) {
        console.error('Server response:', error); // lihat HTML error-nya
        // throw new Error(`Request gagal: ${res.status}`);
    }
    
  }

  function cekStock(id)
  {
    let stockBahan = document.getElementById(`stock${id}`).innerText
    let takaranBahan = document.getElementById(`qty${id}`).value

    console.log(stockBahan);
    console.log(takaranBahan);
    

    if(Number(stockBahan) < Number(takaranBahan)){
      console.log('stock kurang');
    }else{
      console.log('stock cukup');
    }

  }
</script>
</html>