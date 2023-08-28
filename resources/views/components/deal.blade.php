<div class="flex md:flex-row flex-col justify-start items-center text-black-primary gap-6">
    <div class="md:inline-block flex justify-start items-center md:w-auto w-full gap-3">
        <div class="bg-[#f2f2f2] p-4 rounded-lg shadow-[2px_6px_48px_rgba(66,66,66,0.13)] border border-white">
            <img class="w-5 max-w-none" src="{{ $iconPath }}" />                    
        </div>    
        <div class="md:hidden font-fredoka-medium md:text-2xl text-xl font-medium leading-9">{!! $title !!}</div>
    </div>
    <div class="w-full">
        <div class="flex flex-col md:pr-28">
            <div class="hidden md:inline-block font-fredoka-medium md:text-2xl text-xl font-medium leading-9">{!! $title !!}</div>
            <div class="text-lg leading-7">{!! $text !!}</div>
        </div>
    </div>
</div>