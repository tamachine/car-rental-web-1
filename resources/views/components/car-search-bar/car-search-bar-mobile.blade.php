<div id="mobile-search-bar" class="md:hidden w-full" x-on:click="openCalendarClick()">
    <div 
        id="mobile-empty-dates" 
        class="search-input-set bg-gray-primary border-2 rounded-lg px-5"
        >
        <div class="search-input-label text-left">
            <label>{!! __('car-search-bar.mobile-first-input-title') !!}</label>
        </div>
        <input type="text" class="search-input text-left p-0" placeholder="{!! __('car-search-bar.mobile-first-input-placeholder') !!}"
            readonly="readonly" />
    </div>
    
    @include('components.car-search-bar.inputs.dates-mobile')
</div>