@props(['title', 'subtitle', 'caption' => '', 'type' => 'success'])
<div class="bg-white rounded-xl border-2 border-[#8c8c8c] p-4 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] flex flex-col">
      <div class="text-[#1e1e1e] text-3xl font-bold mb-4">{{ $title }}</div>
      <hr class="bg-gray-200 mb-2">
      <div class="text-[#8c8c8c] text-base mb-1">{{ $subtitle }}</div>
      @if ($type == 'success')
      <div class="text-[#67d25f] text-sm font-medium">{{ $caption }}</div>
      @else
      <div class="text-[#e43838] text-sm font-medium">{{ $caption }}</div>
      @endif
</div>