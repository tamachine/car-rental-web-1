<div    
    x-data="{ insuranceBoxVisibility : false }"
    {{ $attributes->merge(['class' => 'w-full
    h-full
    flex flex-col justify-between items-center gap-6
    shadow-lg
    rounded-xl p-5 text-white bg-['.$insurance->color.']']) }}    
    >
    <div class="font-fredoka-medium text-center text-2xl">{{ $insurance->name }}</div>
    <div>
        <div class="font-fredoka-semibold text-5xl">{{ formatPrice($price) }}</div>
        <div>{!! __('insurances.price_mode.'.$insurance->price_mode) !!} </div>
    </div>
    <div
        x-cloak
        x-show="insuranceBoxVisibility"
        class="md:hidden flex flex-col gap-4 my-2"
        >
        
        @foreach($insurance->features as $feature)
            <div>
                <img class="inline mr-3" src="{{ asset('images/icons/check-circle-white.svg') }}" />
                <span>{!! $feature->name !!}</span>
            </div>
        @endforeach
    </div>
    @if($showButton)
    <div>
        <livewire:choose-insurance buttonClass="rounded-xl px-5 py-3 bg-white hover:bg-gray-100 text-black" :insurance="$insurance->toJson()" />
    </div>
    @endif
    <div
        x-on:click="insuranceBoxVisibility = !insuranceBoxVisibility"
        class="md:hidden text-sm font-sans-medium cursor-pointer"
        >
        <div x-cloak x-show="!insuranceBoxVisibility">{!! __('insurances.view-all') !!}<span class="ml-1"><img class="inline" src="{{ asset('images/icons/triangle-down.svg') }}" /></span></div>
        <div x-cloak x-show="insuranceBoxVisibility">{!! __('insurances.hide-all') !!}<span class="ml-1"><img class="inline" src="{{ asset('images/icons/triangle-up.svg') }}" /></span></div>
    </div>
</div>
