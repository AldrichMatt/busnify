@props(['modal_id'])
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<button command="show-modal" commandfor="{{ $modal_id }}"
 class="w-[49px] h-[49px] rounded-xl flex items-center justify-center text-white text-2xl shadow-md hover:opacity-90 transition-opacity
        bg-gray-500
 ">
        <i data-feather="settings" class="text-white size-5"></i>
</button>