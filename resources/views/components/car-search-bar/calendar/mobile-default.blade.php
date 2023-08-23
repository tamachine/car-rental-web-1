{{-- Mobile: show layer default pickup and return time and location --}}
<div :class="showDefault ? '' : 'hidden'"
    class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-20">

    <div x-on:click="openCalendarClick()" class="absolute top-0 left-0 w-full h-full bg-black/50 z-0"></div>

    <div
        class="relative min-w-[85%] max-w-[99%] bg-white rounded-md p-5 shadow-[0_-6px_13px_0_rgba(0,0,0,0.25)]">
        <h3 class=" font-fredoka-medium text-pink-red text-xl leading-tight text-center mb-5">{!! __('car-search-bar.mobile-default-title') !!}</h3>
        <div class="grid grid-cols-2 gap-3 text-black mb-6 font-sans-medium">
            <div class=" text-center">
                <p class="flex items-center justify-center gap-0.5 text-3xl leading-none">
                    12:00 <span class="text-sm">AM</span></p>
                <p class="text-black text-xs">{!! __('car-search-bar.mobile-default-times-title') !!}</p>
            </div>
            <div class=" text-center">
                <p class="flex items-center justify-center gap-0.5 text-3xl leading-none">
                    KEF <span class="text-sm uppercase">{!! __('car-search-bar.mobile-default-location-airport') !!}</span></p>
                <p class="text-black text-xs">{!! __('car-search-bar.mobile-default-location-title') !!}</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
            {{-- Edit button --}}
            <button x-on:click="editDefault()"
                class=" btn btn-border border-black text-lg px-4 py-2">{!! __('car-search-bar.mobile-edit-button') !!}</button>

            {{-- Search button --}}            
            <button x-on:click="mobileSubmit()" class="btn btn-red px-4 py-2">{!! __('car-search-bar.mobile-continue-button') !!}</button>
        </div>
    </div>
</div>