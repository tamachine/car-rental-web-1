<div
    x-show="showDate"
    class="flex flex-col h-full"
    >

    <div 
        id="calendar-picker" 
        x-on:click="openCalendarClick()" 
        x-ref="startDateButton" 
        class="hidden">
    </div>

    <div class="md:hidden w-[80%] text-center mx-auto">

        <button 
            x-on:click="continueMobileButton()"
            disabled id="continue-date__button" 
            class="w-full btn btn-red px-16 py-3"
            >
            {!! __('car-search-bar.mobile-continue-button') !!}
        </button>

    </div>
    
    @push('scripts')
        <script>
           
        </script>
    @endpush
</div>
