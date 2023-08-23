<div x-data="carSearchBar()" class="relative">
    <div x-show="showOverlay" x-on:click="closePopOver()"
        class="fixed h-screen w-screen top-0 left-0 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak></div>

    <div class="max-w-6xl px-7 md:px-3 xl:px-0 mx-auto">
        <form 
            :class="openCalendar ? 'md:shadow-t-xl' : 'md:shadow-xl'" 
            id="search-bar"
            class="relative 
            md:bg-white rounded-3xl font-medium text-black-secondary 
            md:border-[3px] md:border-pink-red"
            autocomplete="off"
            action="{{ route('cars') }}"
            >

            {{-- Este input hay que ponerlo para deshabilitar la opción de autocompletado --}}
            <input autocomplete="false" type="hidden" type="text">

            <div class="flex gap-2 flex-col md:flex-row md:gap-4 lg:gap-6 items-stretch p-3 lg:p-5">

                {{-- DESKTOP --}}
                <div class="hidden md:flex gap-5 lg:gap-8 grow">
                
                    @include('components.car-search-bar.inputs.dates')

                    @include('components.car-search-bar.inputs.times')

                    @include('components.car-search-bar.inputs.locations')
                    
                </div>

                {{-- MOBILE --}}
                @include('components.car-search-bar.car-search-bar-mobile')

                {{-- BUTTON --}}
                <div class="flex items-stretch">
                    {{-- Desktop --}}
                    <x-search-button id="search__button" :disabled="true" class="hidden md:inline-block" />

                    {{-- Mobile --}}
                    <x-search-button id="mobile-search__button" :disabled="false" class="md:hidden" />
                </div>
            </div>

        </form>
    </div>

    @include('components.car-search-bar.calendar.calendar')

    @include('components.car-search-bar.locations.index')
</div>

@push('scripts')
    <script>
        const carSearchUrlParams = {!! CarSearchInitialValues::getJsonData() !!}
    </script>
@endpush