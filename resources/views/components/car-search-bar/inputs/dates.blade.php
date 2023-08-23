<div id="date-inputs" 
    class="search-input-group flex gap-2 basis-[32%] lg:basis-[30%] hover:border-black"
    :class="showOpenDateInput ? 'border-gray-tertiary' : ''"
    x-on:click="openCalendarClick()">

    @foreach ($ranges as $range)
        <x-selected-date size="desktop" range="{{ $range }}" />
    @endforeach
</div>