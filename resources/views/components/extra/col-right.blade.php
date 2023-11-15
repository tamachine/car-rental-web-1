<div class="w-24 md:w-44">
    <div class="flex flex-col gap-0 md:gap-5 justify-center items-center text-center h-full">
        
        @if($extra['max_units'] > 1 )                
            <x-extra.units :name="$extra['name']" :id="$extra['hashid']" :units="$unitsExtras[$extra['hashid']]"/>
        @else
            <div class="md-max:hidden">
                @include('components.extra.price')
            </div>
        @endif
        
        <div>

            @if($extra['max_units'] > 1 )
                <x-plus-minus-input 
                    :livewire-listener-params="$extra['hashid']"
                    :field="'unitsExtras'.'.'.$extra['hashid']"    
                    :starting="$unitsExtras[$extra['hashid']]" 
                    :maximum="$extra['max_units']"
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