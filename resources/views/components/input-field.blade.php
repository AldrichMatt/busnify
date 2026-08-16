@props([
    'label', 
    'type' => 'text',
    'placeholder' => '',
    'name',
    'id' => '',
    'value' => '',
    'required' => TRUE,
    'guide' => ''
])

    <div class="flex flex-col gap-2 w-full pb-4">
        <label class="text-black text-sm font-normal">{{ $label }}</label>
        <div class="w-full bg-white border border-[#8c8c8c] rounded-lg py-2 flex items-center">
            <input class="w-full h-full outline-none text-sm bg-transparent px-2" 
            placeholder="{{ $placeholder !== '' ? $placeholder : $label }}"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            {{ $required ? 'required' : ""; }}>
        </div>
        @if ($guide != '')
            <label class="text-gray-600 text-xs font-normal">{{$guide}}</label>
        @endif
    </div>

    