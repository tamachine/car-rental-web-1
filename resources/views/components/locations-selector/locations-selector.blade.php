<div
    x-data="locationsSelector( { sameLocation: true, locations: '{{ $locationsIds }}' } )"
    class="flex flex-col justify-between h-auto" 
    {{ $attributes }}
    >
    <div class="flex flex-col justify-center items-stretch h-auto">
        <div class="flex items-center justify-between cursor-pointer">
            <h5 
                x-text="differentLocation ? '{!! __('car-search-bar.pick-up-location-title') !!}' : '{!! __('car-search-bar.title-location') !!}'"
                class="text-pink-red text-2xl text-left flex items-center">
            </h5>

            {{-- TOGGLE --}}
            <div x-on:click="toggleLocations()"
                id="toggle"
                class="inline-block bg-gray-primary rounded-full overflow-hidden  border-2 border-gray-primary shadow-[inset_0px_1px_2px_0px_rgba(0,0,0,0.25)] py-[4px] px-[5px]">
                <div class="relative flex align-stretch">
                   
                    {{-- Same location --}}
                    <span 
                        :class="sameLocation ? 'bg-black text-white rounded-full' : 'text-black'"                        
                        id="same-location" 
                        class="relative  text-xs py-2 px-4"
                        >
                        {!! __('car-search-bar.same-location') !!}
                    </span>

                    {{-- Different location --}}
                    <span 
                        :class="!sameLocation ? 'bg-black text-white rounded-full' : 'text-black'"                        
                        id="different-location" 
                        class="relative text-black text-xs py-2 px-4"
                        >
                        {!! __('car-search-bar.different-location') !!}
                    </span>
                </div>
            </div>
        </div>

        <x-locations 
            type="pickup" />

        <x-locations 
            type="dropoff" 
            x-cloak 
            x-show="!sameLocation" 
            id="select-return-location"             
            class="transition-[height]" 
            return-layer-id="return__layer" 
            :title="__('car-search-bar.return-location-title')"
            />        
        
    </div>
</div>