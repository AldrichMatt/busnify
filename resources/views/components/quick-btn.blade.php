@props([
    'link',
    'label'
])

<a href='{{ $link }}' class="py-5 rounded-xl bg-gradient-to-r from-[#B175FB] to-[#001476] text-white font-medium shadow-md hover:opacity-90 transition-opacity">
    {{ $label }}
</a>