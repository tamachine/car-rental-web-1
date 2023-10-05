
<div 
    x-data="plusMinusInput()"
    class="
        bg-[#B1B5C4] text-white 
        flex flex-row items-center justify-between
        gap-1 px-2 py-4
        text-[22px] 
        rounded-md
        h-8"
    >    
    
    <div>
        <div 
            x-on:click="minus()" 
            x-bind:class="minusDisabled ? 'cursor-default' : 'cursor-pointer'"
            class="relative w-5 h-5"
            >
                <div 
                    class="
                        absolute
                        w-5
                        h-0
                        border-2
                        left-0
                        top-2
                        " 
                    x-bind:class="{'border-white' : !minusDisabled}"
                ></div>
        </div>
    </div>
    
    <input type="text" class="text-center bg-transparent border-0 text-white w-12 text-[22px] " readonly x-model="number" wire:model="{{ $field }}"  />
    
    <div 
        x-on:click="plus()"
        
        class="relative w-5 h-5"
        x-bind:class="plusDisabled ? 'cursor-default' : 'cursor-pointer'"
        >
            <div 
                class="
                    absolute
                    w-5
                    h-0
                    border-2
                    left-0
                    top-2
                    "                 
                x-bind:class="{'border-white' : !plusDisabled}"
            ></div>
            <div class="
                    absolute
                    w-0
                    h-5
                    border-2
                    left-2
                    top-0
                    " 
                x-bind:class="{'border-white' : !plusDisabled}"
            ></div>
    </div>
    
</div>
