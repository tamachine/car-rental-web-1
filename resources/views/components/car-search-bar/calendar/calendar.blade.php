<div 
    id="calendar" 
    class="searchbar-popover absolute w-full pointer-events-none"
    x-cloak 
    x-show="openCalendar"    
    >
    
    <div                 
        id="calendar__layer"
        class="searchbar-popover__layer max-w-5xl w-full md:w-[90%] pt-8 pb-4 md:pb-8 overflow-hidden
        before:content-[''] before:md:content-none before:absolute before:top-[32px] before:left-0 before:w-full before:h-[20px] before:bg-gradient-to-b before:from-white before:to-transparent before:z-10 before:pointer-events-none
        after:content-[''] after:md:content-none after:absolute after:bottom-[68px] after:left-0 after:w-full after:h-[20px] after:bg-gradient-to-b after:from-transparent after:to-white after:z-10 after:pointer-events-none
        "
        >
        
        {{-- Calendar and Time picker: Mobile and desktop --}}
        <x-datepicker-range />

        <x-timepicker-range />

        @include('components.car-search-bar.calendar.mobile')
    </div>
</div>