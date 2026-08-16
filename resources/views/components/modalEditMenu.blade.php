@props([
  'menu',
  'dataBarang',
  'modal_id' => 'editMenu'
])
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

  <el-dialog>
    <dialog id="{{ $modal_id }}" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
      <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
      <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
        <div class="bg-white px-4 py-5">
          <form action="menu/add" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $menu->id }}">
            <x-input-field label="Nama Menu" name="nama" value="{{ $menu->nama }}"/>
            <div class="flex gap-2 w-full pb-2">
              <div class="flex flex-col gap-2 ">
                <label class="text-black text-sm font-normal">Gramasi</label>
                <div class="text-center align-middle">
                  <input
                  @if ($menu->gramasi)
                    checked
                  @endif
                    type="checkbox"
                    name="gramasi"
                    class="w-7 h-7 accent-[#001476] px-auto"
                  />
                </div>
              </div>
            <x-input-field label="Kuantitas" name="kuantitas" value="{{ $menu->kuantitas }}"/>
              <div class="flex flex-col w-full gap-2">
                <label class="text-black text-sm font-normal">Tipe</label>
                <div class="w-full text-center bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
                  <select class="w-full h-full outline-none text-sm bg-transparent px-2" 
                  name="tipe"
                  required>
                    @if ($menu->tipe == 'produksi')
                    <option value="produksi" selected >Produksi</option>
                    <option value="resell">Resell</option>
                    @else
                    <option value="produksi">Produksi</option>
                    <option value="resell" selected >Resell</option>
                    @endif
                  </select>
                </div>
              </div>
            </div>
            <div class="flex flex-row gap-2 w-full pb-4">
              <div class="flex flex-col w-full gap-2">
                <label class="text-black text-sm font-normal">Barang</label>
                <div class="w-full text-center bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
                  <select class="w-full h-full outline-none text-sm bg-transparent px-2" 
                  name="id_barang"
                  required>
                  <option value="{{ $menu->id_barang }}">{{ $menu->barang->nama }}</option>
                  @foreach ($dataBarang as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="flex flex-col gap-2 w-full pb-4">
              <label class="text-black text-sm font-normal">Harga</label>
              <div class="w-full bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
                  <input class="w-full h-full outline-none text-sm bg-transparent px-2" 
                  placeholder="Rp "
                  type="text"
                  value="{{ rupiah($menu->harga) }}"
                  oninput="formatRupiah(this, {{ $menu->id }})"
                  >
              </div>
                  <input type="hidden"
                  name="harga_edit"
                  id="harga{{ $menu->id }}"
                  value={{ $menu->harga }}
                  >
          </div>
          </div>
            
            
          
          
          <button type="submit" command="close" commandfor="{{ $modal_id }}" class="inline-flex w-full justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 text-sm font-semibold text-white hover:opacity-50 sm:w-auto">Simpan</button>
          <button type="button" command="close" commandfor="{{ $modal_id }}" class="inline-flex w-full justify-center rounded-md bg-black/50 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:opacity-50 sm:w-auto">Cancel</button>
        </form>
        </div>
      </el-dialog-panel>
    </div>
  </dialog>
</el-dialog>
