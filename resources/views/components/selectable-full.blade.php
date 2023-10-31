<div
    {{ $attributes }}    
    x-data="
        selectableFull(
            {
                value: '{{ $selectedItem->value }}',
                title: '{!! $title !!}',
                allValue: '{{ $allValue }}',
                selectedValue: '{{ $selectedValue }}'
            }
        )"
    x-on:click.away="clickAway()"
>
    <input type="text" x-model="value" class="hidden"/>
    <div 
        class="relative group"       
        >
        <div
            class="
                flex justify-between  
                gap-1 md:gap-5 p-3 border border-gray-secondary group-hover:bg-pink-red-secondary"
            :class="{ 
                'rounded-t-lg': show, 
                'rounded-lg': !show,
                'bg-pink-red-secondary': isSelected }"
            
            x-on:click="toggleVisibility()"
                    
            >
            <div class="flex gap-2 justify-center items-center">
                <img src="{{ $iconPath }}" />
                <button x-text="selectedTitle">{!! $title !!}</button>
            </div>
            <div>
                <img src="{{ asset('images/icons/arrow-down.svg') }}" class="inline w-3" x-show="!show"  />                
                <img src="{{ asset('images/icons/arrow-up.svg') }}" class="inline w-3" x-cloak x-show="show" />               
            </div>
        </div>
        <div
            class="absolute rounded-b-lg w-full border-gray-secondary border border-t-0 bg-white z-10"
            x-cloak
            x-show="show"
        >
            <ul class="divide-y">
                @foreach($items as $selectableFullItem)
                    <li
                        x-on:click="clickItemOnFullMode({{ $selectableFullItem->toJson() }})"
                        wire:click="{{ isset($itemWireClickEvent) ? $itemWireClickEvent.'('.$selectableFullComponent->toJson().','.$selectableFullItem->toJson().')' : '' }}"
                        class="
                            cursor-pointer
                            py-2 pl-9
                            transition ease-in-out duration-300
                            {{ $loop->last ? 'hover:rounded-b-lg ' : '' }}   
                           hover:bg-pink-red hover:text-white                                           
                            "
                        :class="{ 'bg-pink-red text-white' : (selectedValue == '{{ $selectableFullItem->value }}') }"
                    >
                    {!! $selectableFullItem->text !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<input wire:model="selectables.{{ $wireModel }}"  type="hidden">

