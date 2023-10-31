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
        x-on:mouseover.away="close()"
        >
        <div
            class="
                flex justify-between  
                gap-1"
            :class="{ 
                'rounded-t-lg': show, 
                'rounded-lg': !show,
                'bg-pink-red-secondary': isSelected }"                        
            x-on:mouseover="open()"
            >
            <div class="flex gap-2 justify-center items-center">
                <img src="{{ $iconPath }}" />
                <button x-text="selectedTitle">{!! $title !!}</button>
            </div>
            <div>
                <img src="{{ asset('images/icons/arrow-down.svg') }}" class="inline w-3"  />               
            </div>
        </div>
        <div
            class="absolute rounded-b-lg inline-block whitespace-nowrap left-1/2 transform -translate-x-1/2 bg-white z-10"
            x-cloak
            x-show="show"
        >
            <ul class="divide-y">
                @foreach($items as $selectableFullItem)
                    <li
                        x-on:click="clickItemOnSimpleMode({{ $selectableFullItem->toJson() }})"                        
                        class="
                            cursor-pointer
                            py-2 px-3
                            transition ease-in-out duration-300
                            {{ $loop->last ? 'hover:rounded-b-lg ' : '' }}   
                            hover:text-pink-red                                          
                            "
                        :class="{ 'text-pink-red' : (selectedValue == '{{ $selectableFullItem->value }}') }"
                    >
                    {!! $selectableFullItem->text !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

