<div class="flex flex-col md:flex-row-reverse gap-5">
    <div class="flex flex-col gap-3 md:gap-5 flex-1">
        <img class="object-cover rounded-xl" src="{{ asset('images/home/why-iceland-1.png') }}" />
        <div class="grid grid-cols-2 gap-3 md:gap-5">
            <img class="object-cover rounded-xl w-full" src="{{ asset('images/home/why-iceland-2.png') }}" />
            <img class="object-cover rounded-xl w-full" src="{{ asset('images/home/why-iceland-3.png') }}" />
        </div>
    </div>
    <div class="bg-pink-red-secondary rounded-xl px-7 py-12 md:px-12 md:py-24 flex-1 md:overflow-auto md:max-h-full tiny-content">
        <h2 class="pb-6 md:pb-9 md:pr-0 pr-28" > {!! __('home.why-iceland-title') !!}</h2>        
        <x-read-more-block text="{!! __('home.why-iceland-text') !!}" />
    </div>    
</div>

