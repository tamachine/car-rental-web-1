<div id="time-inputs" 
    class="search-input-group flex gap-2 basis-[21%] hover:border-black" 
    :class="showOpenTimesInput ? 'border-gray-tertiary' : ''"
    x-on:click="openTimeClick()"     
    >
    
    <div class="search-input-set">
        <div class="search-input-label">
            <label for="hour-start">{!! __('car-search-bar.time') !!}</label>
        </div>
        <input             
            type="text" name="hours[start]" class="search-input" id="hour-start" placeholder="12 AM"
            readonly="readonly" />
    </div>
    <div class="search-input-set">
        <div class="search-input-label">
            <label for="hour-end">{!! __('car-search-bar.time') !!}</label>
        </div>
        <input type="text" name="hours[end]" class="search-input" id="hour-end" placeholder="12 AM"
            readonly="readonly" />
    </div>
</div>