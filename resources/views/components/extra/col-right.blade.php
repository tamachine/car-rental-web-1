<div class="w-24 md:w-44">
    <div class="flex flex-col gap-5 justify-center items-center text-center h-full">
        <div class="md-max:hidden">
            @include('components.extra.price')
        </div>
        <div>

            @if($extra['max_units'] > 1 )
                <x-plus-minus-input field="extra" bg="bg-black" text="text-white" :show-number="false" class="w-[109px] gap-0 px-2 py-4 rounded-md h-8 mx-auto" />
            @else
                @include('components.extra.button')
            @endif
            
        </div>
    </div>
</div>