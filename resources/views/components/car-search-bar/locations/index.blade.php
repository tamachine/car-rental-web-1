<div 
    id="locations" 
    class="searchbar-popover absolute w-full hidden md:block h-0 pointer-events-none"    
    :class="{
        'show h-auto': showLocations,
        '!h-0': !showLocations,
        'different-location': differentLocation,
        'same-location': !differentLocation
    }"
    x-cloak>
    <div id="locations__layer"
        class="searchbar-popover__layer w-full md:w-[85%] max-w-4xl px-[4%] pt-10 pb-4 md:pb-6 ">
        {{-- Location: desktop --}}
        
        <x-locations-selector />
    </div>
</div>
