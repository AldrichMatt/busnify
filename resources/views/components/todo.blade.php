@props(
    ['text' => '']
)
<div class="flex flex-col w-[90%] text-white bg-rose-700 py-5 px-10 my-5 mx-auto">
    <span>
        TO DO
    </span>
    <span class="text-wrap">
        {{ $text }}
    </span>
</div>