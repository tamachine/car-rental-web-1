<div
    class="bg-white w-[160px] md:w-[185px] font-sans-medium text-black-secondary cursor-pointer text-sm md:text-base"
    x-data="
        selectableFull(
            {
                value: '{{ $selectedItem->value }}',
                title: '{!! $title !!}',
                allValue: '{{ $allValue }}'
            }
        )"
    x-on:click.away="clickAway()"
>
    <input type="text" x-model="value" class="hidden"/>
    <div class="relative group">
        <div
            class="flex justify-between gap-1 md:gap-5 border-gray-secondary border p-3 group-hover:bg-pink-red-secondary"
            :class="{ 'rounded-t-lg': show, 'rounded-lg': !show,'bg-pink-red-secondary': isSelected }"
            x-on:click="toggleVisibility()"
            >
            <div class="flex gap-2 justify-center items-center">
                <img src="{{ $iconPath }}" />
                <button x-text="selectedTitle">{!! $title !!}</button>
            </div>
            <div>
                <img src="{{ asset('images/icons/arrow-down.svg') }}" class="inline w-3" x-show="!show" />
                <img src="{{ asset('images/icons/arrow-up.svg') }}" class="inline w-3" x-cloak x-show="show"/>
            </div>
        </div>
        <div
            class="absolute rounded-b-lg border-gray-secondary border border-t-0 w-full bg-white z-10"
            x-cloak
            x-show="show"
        >
            <ul class="divide-y">
                @foreach($items as $selectableFullItem)
                    <li
                        x-on:click="clickItem({{ $selectableFullItem->toJson() }})"
                        wire:click="{{ isset($itemWireClickEvent) ? $itemWireClickEvent.'('.$selectableFullComponent->toJson().','.$selectableFullItem->toJson().')' : '' }}"
                        class="
                            py-2 pl-9
                            transition ease-in-out hover:bg-pink-red hover:text-white duration-300
                            "
                    >
                    {!! $selectableFullItem->text !!}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<input wire:model="selectables.{{ $selectableFullComponent->getInstance() }}"  type="hidden">
