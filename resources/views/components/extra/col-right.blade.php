<div class="w-24 md:w-44">
    <div class="flex flex-col gap-5 justify-center items-center text-center h-full">
        <div class="md-max:hidden">
            @if($extra['max_units'] > 1 )                
                <x-extra.units :name="$extra['name']" :id="$extra['hashid']" :units="$unitsExtras[$extra['hashid']]"/>
            @else
                @include('components.extra.price')
            @endif
        </div>
        <div>

            @if($extra['max_units'] > 1 )
                <x-plus-minus-input 
                    :livewire-listener-params="$extra['hashid']"
                    :field="'unitsExtras'.'.'.$extra['hashid']"    
                    :starting="$unitsExtras[$extra['hashid']]" 
                    :livewire-number-element-id="'extra-units-'. $extra['hashid']"  
                    spinner-id="clickUnitExtra-spinner"              
                    bg="bg-black" 
                    text="text-white" 
                    :show-number="false"                     
                    class="w-20 md:w-[109px] gap-0 px-2 py-4 rounded-md h-8 mx-auto" 
                />
            @else
                @include('components.extra.button')
            @endif
            
        </div>
    </div>
</div>