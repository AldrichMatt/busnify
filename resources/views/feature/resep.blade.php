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
  <x-todo text="fitur cari resep di bagian ujung kanan table header resep
  "/>
  <!-- Tables Section -->
<section id="tables" class="w-full">
  <div class="mx-auto px-20 flex flex-row gap-4">
    
    <div class="bg-white rounded-xl py-3 grow h-min flex flex-col ">
      <!-- Card Header -->
      <div class="flex justify-between items-center px-10 pt-3 mb-3">
        <h3 class="text-black text-4xl font-bold">Resep</h3>
      </div>
      
      <!-- Table Content -->
      <div class="w-full flex flex-col">
        <!-- Table Header Row -->
        <div class="bg-[#f8f7f5] flex justify-between items-center px-6 py-5 text-[#635549] text-base font-normal">
          <div class="w-[25%] pl-5">Nama Barang</div>
        </div>        
        <!-- Table Data Row --> 

        @foreach ($allResep as $namaBarang => $items)
        {{-- @dd($items) --}}
        <button onclick="fetchBahan('{{ $items[0]->id_barang }}')">
          <div class="bg-white flex justify-between items-center px-6 py-4 border-t border-gray-100">
            <div class="w-[75%] text-start pl-5 text-[#635549]">{{ $namaBarang }}</div>
            <div class="w-[25%] text-end flex row justify-end gap-2">
              <a href='resep/edit/{{ $items[0]->id_barang }}'>
                  <div class="bg-[#f27f0d] hover:bg-[#d37e0d] p-2 rounded">
        <i data-feather="edit-2" class="text-white size-5"></i>
                  </div>
              </a>
              <i class="chev{{ $items[0]->id_barang }}" data-feather="chevron-down"></i>
            </div>
          </div>
        </button>
        <div class="tempat-resep{{ $items[0]->id_barang }}">

        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<section id="stats" class="w-full pt-3">
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
              class="idBarang w-full outline-none text-sm bg-transparent px-2">
              @foreach ($allMenu as $menu)
              <option value={{ $menu->id }}>{{ $menu->nama }}</option>
              @endforeach
              </select>
            </div>
            
            <label class="text-black text-sm font-normal">List Bahan</label>
            {{-- tabel bahan resep --}}
            <div class="w-full max-h-[200px] overflow-y-scroll" id="bahan_resep">
            </div>
            <button
            type="button"
            onclick="submitForm(event)"
            class="inline-flex w-full justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 text-sm font-semibold text-white hover:opacity-50 sm:w-auto">
            Tambah Resep
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

    tabelBahan.addEventListener('click', function(e){
      if(e.target.classList.contains('hapus-btn')){
        e.target.closest('.bahan-row').remove();
        reindexBahan();
      }
    });

    function fetchBahan(idBarang){
      try {
          fetch(`/fetch/resep/${encodeURIComponent(idBarang)}`)
          .then(res => res.json())
          .then(data => showResep(idBarang, data));
      } catch (error) {
        console.error(error)
      }
    }

    function showResep(idBarang, data) {

  const container = document.querySelector(`.tempat-resep${idBarang}`);

  if (!container) return;

  if (container.innerHTML.trim() !== "") {
    container.innerHTML = "";
    return;
  }

  let html = "";

  if (data.length === 0) {
    html = `
      <div class="bg-gray-50 px-6 py-3 text-sm text-gray-500">
        Tidak ada bahan
      </div>
    `;
  } else {
    data.forEach(item => {
      html.addAdjacentHTML('beforeend', `
        <div class="bg-gray-50 flex justify-between px-6 py-3 border-t border-gray-100">
          <div>${item.bahan.nama}</div>
          <div>${item.takaran} ${item.bahan.satuan ?? ""}</div>
        </div>
      `);
    });
  }

  container.innerHTML = html;

  // rotate icon kalau mau
  const icon = document.querySelector(`.chev${idBarang}`);
  if (icon) {
    icon.classList.toggle("rotate-180");
  }
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
          tabelBahan.innerHTML += `
        <div class="bahan-row
        flex justify-between items-center px-6 py-3 text-[#635549] font-normal
        bg-gray-100 border-t text-start" id="bahan${ nextIndex }">
            <div class="w-[5%] text-[#635549] index-bahan">
              <input 
              class = "bahanId"
              type="hidden"
              value = ${bahan.id}
              />
              ${ nextIndex }
            </div>
            <div class="w-[25%] text-[#635549]">${bahan.nama}</div>
            <div class="w-[25%] text-[#635549] flex-row">
              <div class="w-92 bg-white border border-[#8c8c8c] rounded-lg py-2 px-2 flex items-center">
                <input class="bahanQty w-full h-full outline-none text-sm bg-transparent"
                type="number"
                required>
                gr 
                </div>
              </div>
              <button class="hapus-btn w-[5%] text-white bg-[#e43838] hover:bg-[#bc4343] p-2 rounded">x</button>
            </div>
            `
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