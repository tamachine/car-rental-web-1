<div
    x-cloak
    x-show="tooltip" 
    x-ref="{{ $ref ?? '' }}"                       
    class="
        w-full md:w-max
        text-left text-sm md:text-sm text-black         
        md:rounded-2xl rounded-[10px] border-[#E7ECF3] border bg-white        
        "
    >
    <div class="relative py-5 pr-9 pl-4">
        <div class="absolute right-3 top-2 cursor-pointer" x-on:click="tooltip = false"><img src="{{ asset('images/icons/close-circle-black.svg') }}" /></div>
        
        <div class="grid grid-cols-[min-content_auto] gap-x-5 gap-y-2 font-sans-medium text-sm">

            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $weekDay)
            <div>{!! __('home.location-map-'.$weekDay) !!}</div>
            <div class="w-full">{!! __('home.location-map-'.$weekDay.'-hours') !!}</div>                            
            @endforeach

        </div>     
    </div>                      
</div>