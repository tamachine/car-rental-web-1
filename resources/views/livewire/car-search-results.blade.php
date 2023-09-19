<div x-data="{redirecting: false}">
    @if($showFilters)
        @include('cars.partial.car-categories')

        @include('cars.partial.car-selectables')  
        <div x-show="!redirecting">
            <x-wire-spinner x-show="!redirecting"/> 
        </div>
    @endif

    <div class="cars__list flex md:gap-x-6
            @if ($widthFillScreen)
                w-fill-screen 
                2xl:max-w-screen-2xl
                2xl:left-[calc((100%_-_1536px)_/_2)]
            @endif
        ">
        @if(count($cars) > 0)

            {{-- Livewire redirection is fired after the request has ended so we control the loading of the spinner manually in order to avoid the flickering caused by this --}}
            <x-spinner x-cloak x-show="redirecting" />
            
            <div
                x-show="!redirecting" 
                wire:loading.remove
                class="gap-x-5 gap-y-8 md:px-10 mx-auto

                    {{-- 
                        1 coche 
                        2 coches 
                    --}}
                    @if(count($cars) <= 2) 
                        flex flex-wrap justify-center
                    @endif

                    {{-- 
                        3 coches
                    --}}
                    @if(count($cars) == 3) 
                        grid justify-center
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))] lg:grid-cols-[repeat(3,_minmax(300px,_1fr))]
                    @endif

                    {{-- 
                        4 coches con imagen
                    --}}
                    @if(count($cars) == 4 && $showImageIfLittleResults) 
                        grid justify-center basis-0 grow
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))]
                    @endif

                    {{-- 
                        4 coches sin imagen
                        > 4 coches 
                    --}}
                    @if(count($cars) > 4 || (count($cars) == 4 && $showImageIfLittleResults == 0)) 
                        grid justify-center basis-0 grow
                        sm:grid-cols-[repeat(2,_minmax(300px,_1fr))]
                        lg:grid-cols-[repeat(auto-fit,_minmax(310px,_1fr))]
                    @endif
                    
                    ">
                @foreach($cars as $car)                    
                    <x-car-card :car="$car" :canBeBooked="$searchByDates" :redirectToCarsPage="$isLanding"/>
                @endforeach        
            </div>

            @if(count($cars) == 4 && $showImageIfLittleResults) 
                <div
                    x-show="!redirecting" 
                    wire:loading.remove 
                    class="relative hidden lg:inline-block w-1/3 image-wrapper rounded-2xl">
                    <img class="absolute top-[-50%] left-[-50%] translate-x-[50%] translate-y-[50%]" src="{{ asset('/images/landing-cars/road.jpg') }}" alt="">
                </div>
            @endif
        
        @else
            <div x-show="!redirecting" wire:loading.remove class="text-center w-full">
                {!! __('cars.search-not-found') !!}
            </div>
        @endif
    </div>
</div>