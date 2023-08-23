<div id="location-inputs" 
    class="search-input-group flex gap-2 basis-[41%] lg:basis-[44%] hover:border-black"
    :class="showOpenLocationsInput ? 'border-gray-tertiary' : ''"
    x-on:click="openLocationsClick()"  
    x-data="locationInputs({ locations: '{{ $locationsIds }}' })"  
    >

    <div class="search-input-set">
        <div class="search-input-label">
            <label for="pickup-location">{!! __('car-search-bar.pick-up-location') !!}</label>
        </div>
        <input type="text" class="search-input text-sm" id="pickup-location" name="locations[pickup]"
            placeholder="{{ __('car-search-bar.pick-up-location-placeholder') }}" readonly="readonly" x-model="startLocation"/>
    </div>
    <div class="search-input-set">
        <div class="search-input-label">
            <label for="return-location">{!! __('car-search-bar.return-location') !!}</label>
        </div>
        <input type="text" class="search-input text-sm" id="return-location" name="locations[return]"
            placeholder="{{ __('car-search-bar.return-location-placeholder') }}" readonly="readonly"x-model="endLocation" />
    </div>
</div>