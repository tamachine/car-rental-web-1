<div class="grid grid-cols-[96px_1fr] md:grid-cols-[170px_auto] gap-3 md:gap-10 p-3 sm:px-8 md:p-8">
    <div class="md-max:h-24 relative">        
        @if(!empty($extra['featured_image_url']))            
            <x-webp-image :image-path="$extra['featured_image_url']"  class="rounded-xl md-max:w-24 md-max:h-24 md-max:object-cover" />
        @endif
        <div
            class="absolute top-3 left-3 block md:hidden bg-black rounded-full cursor-pointer"
            x-on:click="open()"
            wire:click="info('{{ $extra['hashid'] }}')"
        >            
            <img src="{{ asset('images/icons/info-pink.svg') }}" />            
        </div>
    </div>
    <div>
        <div class="font-fredoka-medium text-xl md:text-2xl">{!! $extra['name'] !!}</div>
        <div class="md-max:hidden text-sm">{!! $extra['description'] !!}</div>
        <div class="md:hidden flex justify-start items-center gap-1 flex-wrap">
            @include('components.extra.price')
        </div>
    </div>       
</div>