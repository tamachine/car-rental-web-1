<div
    x-data 
    x-on:click="{{ $href ? 'window.location.href="' . $href . '"' : '' }}"
    class="relative  min-h-[495px] rounded-2xl overflow-hidden
    {{ $hover != '' ? 'hover-change-image' : 'hover-no-image' }}
    {{ $href ? 'cursor-pointer' : '' }}
    ">   

    <x-background-hover-transition 
        :image="$image" 
        :hover="$hover" 
        class="gradient-pink"
    />

    <div class="relative px-5 py-7 h-full flex flex-col justify-between">
        <div class="flex-grow mb-4 md:mb-8">
            <x-reading-time-icon text="{{ $textForTime }}" />
        </div>
        <div class="drop-shadow-text text-white">
            <div class="font-fredoka-semibold text-3xl">{{ $title }}</div>
            <div class="font-sans-medium md:text-base text-lg line-clamp-3">{{ $text }}</div>
        </div>
    </div>  
</div>