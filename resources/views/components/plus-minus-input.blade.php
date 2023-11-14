@props([
    'bg'    => 'bg-[#B1B5C4]',
    'text'  => 'text-white',
    'showNumber' => true,
    'field'
])

<div 
    x-data="plusMinusInput()"    
    {{ $attributes->merge([
            'class' => $bg . " " . $text . "                 
                flex flex-row items-center justify-between                
                "]) }}  
    >    
    
    <div>
        <div 
            x-on:click="minus()" 
            x-bind:class="minusDisabled ? 'cursor-default' : 'cursor-pointer'"
            class="flex items-center justify-center w-5 h-5"
            >
            
            <svg width="18" height="2" viewBox="0 0 18 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="1" x2="17" y2="1" x-bind:stroke="plusDisabled ? 'gray' : 'white'" stroke-width="2" stroke-linecap="round"/>
            </svg>
            
        </div>
    </div>
      
    @if(!$showNumber)
        <svg width="1" height="17" viewBox="0 0 1 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0.5" y1="0.5" x2="0.499999" y2="16.5" stroke="#E7ECF3" stroke-linecap="round"/>
        </svg>
    @else
        <input type="text" class="text-center bg-transparent border-0 text-white w-12 text-[22px]" readonly x-model="number" wire:model="{{ $field }}"  />
    @endif

    <div 
        x-on:click="plus()"
        
        class="relative w-5 h-5"
        x-bind:class="plusDisabled ? 'cursor-default' : 'cursor-pointer'"
        >

        <div>            
            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="9" x2="17" y2="9" x-bind:stroke="plusDisabled ? 'gray' : 'white'" stroke-width="2" stroke-linecap="round"/>
                <line x1="9" y1="17" x2="9" y2="1" x-bind:stroke="plusDisabled ? 'gray' : 'white'" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
            
    </div>
    
</div>
