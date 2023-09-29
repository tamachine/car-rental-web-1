<div
    x-data="extraPrice()"
    >    
    {{-- desktop --}}
    <div
        class="hidden md:grid grid-cols-[1fr_auto] md:divide-x rounded-xl bg-white border min-h-[112px] md:min-h-[180px] "
        >
        @include('components.extra.col-left')

        @include('components.extra.col-right')
    </div>

    {{-- mobile --}}
    <div
        class="grid md:hidden grid-cols-[1fr_auto_auto] md:divide-x rounded-xl bg-white border min-h-[112px] md:min-h-[180px] "
        >
        @include('components.extra.col-left')

        <x-divide-short />

        @include('components.extra.col-right')
    </div>
</div>