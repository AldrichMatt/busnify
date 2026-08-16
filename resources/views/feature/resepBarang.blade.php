<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep</title>
  <meta charset="UTF-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
  <!-- Hero Section: Back Button and Page Title -->
<section class="w-full py-10">
<section id="hero" class="w-full">
  <div class="mx-20 flex flex-col gap-8">
    <!-- Back Button -->
    <a href="/barang" class="flex items-center gap-2 mb-4 cursor-pointer hover:opacity-80 w-fit">
      <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-18 h-18">
      <span class="text-white text-sm font-medium">Back</span>
    </a>
  </div>
</section>
  <!-- Stats Section: 3 Summary Cards -->
  <!-- Tables Section -->
<section id="stats" class="w-full pt-3">
    <input type="hidden" name="id_barang" class="idBarang" value="{{ $barang->id }}">
    <div class="mx-20 py-3 my-3 bg-white rounded-xl border-2 border-[#8c8c8c] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4 pt-3 px-10">Resep {{$barang->nama}} </div>
      <div class="flex row justify-b">
        <div class="flex flex-col grow min-w-100">
          <div class="w-full flex flex-col grow ">
            <h2 class="text-[#1e1e1e] text-lg font-medium px-5 pb-3">
              Pilih Bahan
            </h2>
            <!-- Table Header Row -->
            <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] font-normal rounded-t-lg border border-gray-100">
              <div class="w-[5%]">Id</div>
              <div class="w-[25%]">Nama Bahan</div>
              <div class="w-[25%]">Harga / Satuan</div>
              <div class="w-[25%] text-end">Aksi</div>
            </div>
            <div class="tempat-bahan w-full max-h-68.75 overflow-y-scroll">

              <!-- Table Data Row -->
              @foreach ($allBahan as $bahan)
              <div class="
              flex justify-between items-center px-6 py-3 text-[#635549] font-normal
              bg-white border-t text-start border-gray-100">
              <div class="w-[5%] text-[#635549]">{{ $bahan->id }}</div>
              <div class="nama-bahan w-[25%] text-[#635549]">{{ $bahan->nama }}</div>
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
        
        <div class="flex flex-col gap-2 grow px-5 bg-white">
          <h2 class="text-[#1e1e1e] text-lg font-medium px-5 pb-3">
            List Bahan
          </h2>
          <div class="w-full pe-3 flex flex-row gap-3 pt-2 text-end border-b-2 border-gray-400 pb-2">
            <i data-feather="search" class="text-gray-400 size-5"></i>
            <input type="text" class="w-full" id="search-bahan" oninput="search('bahan', this.value)" placeholder="Nama Bahan...">
          </div>
            {{-- tabel bahan resep --}}            
            <div class="w-full max-h-68.75 overflow-y-scroll" id="bahan_resep">
              
            @foreach ($allResep as $index => $resep)
              <div class="bahan-row
              flex justify-between items-center px-6 py-3 text-[#635549] font-normal
              bg-gray-100 border-t text-start" id="bahan{{ $index+1 }}">
                  <div class="w-[5%] text-[#635549] index-bahan">
                    <input 
                    class="bahanId"
                    type="hidden"
                    value ='{{ $resep->bahan->id }}'
                    />
                    {{ $index+1 }}
                  </div>
                  <div class="w-[25%] text-[#635549]">{{$resep->bahan->nama}}</div>
                  <div class="w-[25%] text-[#635549] flex-row">
                    <div class="w-92 bg-white border border-[#8c8c8c] rounded-lg py-2 px-2 flex items-center">
                      <input class="bahanQty w-full h-full outline-none text-sm bg-transparent"
                      type="number"
                      value="{{ $resep->takaran }}"
                      required>
                      {{ $resep->bahan->satuan }}
                      </div>
                    </div>
                    <button class="hapus-btn w-[5%] text-white bg-[#e43838] hover:bg-[#bc4343] p-2 rounded">x</button>
                  </div>
            @endforeach
            </div>
            <button
            type="button"
            onclick="submitForm(event)"
            class="inline-flex w-full justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 text-sm font-semibold text-white hover:opacity-50 sm:w-auto">
            Simpan Resep
            </button>
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
  // const searchBahan = document.getElementById('search-bahan');
  // const searchResep = document.getElementById('search-resep');

  tabelBahan.addEventListener('click', function(e){
    if(e.target.classList.contains('hapus-btn')){
      e.target.closest('.bahan-row').remove();
      reindexBahan();
    }
  });

  function search(tipe, key) {

    const keyword = key.toLowerCase().trim();
    const items = document.querySelectorAll(`.tempat-${tipe}`).children;

    const container =
    document.querySelector(`.tempat-${tipe}`);

    Array.from(container.children).forEach(item => {

      console.log(item);
      // console.log(item.querySelector(`.nama-${tipe}`));
        const nama =
            item.querySelector(`.nama-${tipe}`)
                .textContent
                .toLowerCase();

        item.style.display =
            nama.includes(keyword)
                ? ''
                : 'none';
    });
}

  function reindexBahan(){
    let rows = tabelBahan.querySelectorAll('[id^="bahan"]');

    rows.forEach((row, index) => {
      row.querySelector('.index-bahan').innerText = index + 1;
    });

    i = rows.length;
  }

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
    let nextIndex = tabelBahan.children.length + 1;     
    if(filterBahan(bahan)){
      tabelBahan.insertAdjacentHTML('beforeend',`
    <div class="bahan-row
    flex justify-between items-center px-6 py-3 text-[#635549] font-normal
    bg-gray-100 border-t text-start" id="bahan${ nextIndex }">
        <div class="w-[5%] text-[#635549] index-bahan">
          <input 
          class="bahanId"
          type="hidden"
          value ='${bahan.id}'
          />
          ${ nextIndex }
        </div>
        <div class="w-[25%] text-[#635549]">${bahan.nama}</div>
        <div class="w-[25%] text-[#635549] flex-row">
          <div class="w-92 bg-white border border-[#8c8c8c] rounded-lg py-2 px-2 flex items-center">
            <input class="bahanQty w-full h-full outline-none text-sm bg-transparent"
            type="number"
            required>
            ${bahan.satuan} 
            </div>
          </div>
          <button class="hapus-btn w-[5%] text-white bg-[#e43838] hover:bg-[#bc4343] p-2 rounded">x</button>
        </div>
        `);
      }
  }

  function getFormData(){
    let dataBahan = [];

    document.querySelectorAll('.bahan-row').forEach(row => {
      let id = row.querySelector('.bahanId').value;
      let qty = row.querySelector('.bahanQty').value;

      dataBahan.push({
        id : Number(id),
        qty : Number(qty)
      });

    });
    
    return dataBahan;
  }

  async function submitForm(e){
    e.preventDefault();
    let formData = getFormData();
    let menu_id = document.querySelector('.idBarang').value
    try {
      const res = await fetch('/resep/add',{
        method : "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body : JSON.stringify({
          menu_id : menu_id,
          bahan : formData
        })
      });

      if(!res.ok){
        throw new Error("Request gagal");
      }

      const data = await res.json();
      location.reload();
    } catch (error) {
      console.error(error)
    }
    
  }


</script>
</body>
</html>