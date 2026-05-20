@props(['modal_id'])
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<button command="show-modal" commandfor="{{ $modal_id }}"
 class="bg-[#f27f0d] hover:bg-[#d37e0d] p-2 rounded">
        <i data-feather="edit-2" class="text-white size-5"></i>
</button>