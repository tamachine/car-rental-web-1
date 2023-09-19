<div class="flex flex-col flex-1 min-w-[300px] max-w-[460px] bg-white border-[1px] border-gray-primary rounded-2xl overflow-hidden mx-auto">
    <div class="bg-gray-primary text-gray-600 group relative
        ">
        @if ($hasHover)            
            <x-webp-image :image-path="$mainImageModelImage->url" class="w-full transition ease-in-out opacity-100 group-hover:opacity-0 duration-300"/>   
            <x-webp-image :image-path="$secondaryImage->url" class="absolute top-0 left-0 h-full w-full object-cover object-center transition ease-in-out opacity-0 group-hover:opacity-100 duration-300"/>               
        @else
            @if ($mainImageModelImage)                                
                <x-webp-image :image-path="$mainImageModelImage->url" class="w-full"/>             
            @else                
                <x-webp-image :image-path="asset($mainImagePath)" class="w-full"/>
            @endif
        @endif

        <div
            class="absolute bottom-5 right-5 bg-white px-2 py-1 rounded-md border border-[#E7ECF3] text-xs cursor-pointer hover:bg-black hover:text-white hover:border-pink-red group">
            <span>{{ __('cars.card-quick-look') }}</span> <img class="inline group-hover:hidden"
                src="{{ asset('images/icons/eye.svg') }}" /> <img class="hidden group-hover:inline"
                src="{{ asset('images/icons/eye-white.svg') }}" />
        </div>
    </div>
    <div class="flex flex-col gap-6 p-5 md:p-6 justify-between h-full">
        <div class="font-fredoka-semibold text-2xl sm:text-xl xl:text-2xl">{!! $car->name !!}</div>
        <div class="flex flex-col gap-7">
            <div class="flex flex-col gap-y-2">
                <div class="text-gray-tertiary">{!! __('cars.card-features') !!}</div>
                <div class="grid grid-cols-[35%_1fr] gap-3 text-sm xl:text-base">
                    <div>
                        <img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('seat') }}" />
                        {{ $car->adult_passengers }} <span>{!! __('cars.card-seats') !!}</span>
                    </div>
                    <div>
                        <img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('transmission') }}" />
                        <span>{!! __('cars.card-transmission-' . $car->transmission) !!}</span>
                    </div>
                    <div>
                        <img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('engine') }}" />
                        <span>{!! __('cars.card-engine-' . $car->engine) !!}</span>
                    </div>
                    <div>
                        <img class="inline w-4" src="{{ App\Helpers\CarsFilters::getIconPath('road') }}" />
                        <span>{!! $car->fRoadAllowed ? __('cars.card-f-road-allowed') : __('cars.card-f-road-not-allowed') !!}</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row justify-between items-center gap-4
                        sm:flex-col sm:items-start
                        md:flex-row md:items-center">
                <div>                   
                    <div class="text-gray-tertiary">
                        {!! __('cars.card-price-start') !!}
                    </div>                   
                    <div>
                        <span class="font-sans-bold text-2xl">
                            {!! formatPrice($car->daily_price) !!}
                        </span>
                        <span class="">{!! __('cars.card-perday') !!}</span>
                    </div>
                </div>
                
                <div>
                    @if($canBeBooked)
                    <button 
                        class="btn btn-black text-base px-5 py-3"
                        x-on:click="redirecting = true"
                        wire:click="selectCar('{{ $car->hashid }}')"
                    >
                        {!! __('cars.card-button') !!}
                    </button>
                    @elseif($redirectToCarsPage)
                    <button 
                        class="btn btn-black text-base px-5 py-3"
                        x-on:click="window.location.href='{{ route('cars') }}'"
                    >
                        {!! __('cars.card-button') !!}
                    </button>
                    @else
                    <button 
                        class="btn btn-black text-base px-5 py-3"
                        x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"                        
                    >
                        {!! __('cars.card-button') !!}
                    </button>
                    @endif
                </div>
                
                
            </div>
        </div>
    </div>
</div>
