@props([
  'modal_id' => 'bahan'
])
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

  <el-dialog>
    <dialog id="{{ $modal_id }}" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
      <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
      <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
        <div class="bg-white px-4 py-5">
          <form action="bahan/add" method="post">
            @csrf
          <x-input-field label="Nama Bahan" name="nama"/>
            <div class="flex flex-row">
          <div class="flex flex-col gap-2 w-full pb-4">
              <label class="text-black text-sm font-normal">Harga</label>
              
                <div class="w-full bg-white border-t border-s border-b border-[#8c8c8c] rounded-s-lg py-2 flex items-center">
                  <input class="w-full h-full outline-none text-sm bg-transparent px-2" 
                  placeholder="Rp "
                  type="text"
                  oninput="formatRupiah(this)"
                  required >
                </div>
                <input type="hidden"
                name="harga"
                id="harga"
                >
              </div>
              <div class="flex flex-col gap-2 w-full pb-4">
                <label class="text-black text-sm font-normal">/ Satuan</label>
                <div class="w-full bg-white border-t border-e border-b border-[#8c8c8c] rounded-e-lg py-2 flex items-center">
                  <span class="text-xs">/</span>
                    <input class="w-full h-full outline-none text-sm bg-transparent px-2" 
                    placeholder="Satuan"
                    type="text"
                    name="satuan"
                    id="satuan"
                    required>
                </div>
            </div>
          </div>
          
          <button type="submit" command="close" commandfor="{{ $modal_id }}" class="inline-flex w-full justify-center rounded-md bg-gradient-to-b from-[#B175FB] to-[#001476] px-3 py-2 text-sm font-semibold text-white hover:opacity-50 sm:w-auto">Tambah Akun</button>
          <button type="button" command="close" commandfor="{{ $modal_id }}" class="inline-flex w-full justify-center rounded-md bg-black/50 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:opacity-50 sm:w-auto">Cancel</button>
        </form>
        </div>
      </el-dialog-panel>
    </div>
  </dialog>
</el-dialog>
