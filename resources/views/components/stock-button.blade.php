@props(['modal_id'])
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<button command="show-modal" commandfor="{{ $modal_id }}"
 class="bg-[#0d6cf2] hover:bg-[#0f5cc7] p-2 rounded">
        <i data-feather="package" class="text-white size-5"></i>
</button>