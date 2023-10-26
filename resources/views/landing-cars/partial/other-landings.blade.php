<section class="other-landings mt-28 md:mt-36">
    {{-- NOTA:
         El contenido de este módulo serán páginas comerciales que iremos creando. 
    --}}
    
    <div x-data="{ viewMore: false }">
        <h2 class="mb-8">{!! __('landing-cars.otherlandings-title') !!}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-100 gap-6">
            @foreach ($otherlandings as $key => $landing)
                <a href="{{ $landing['route'] }}" 
                    @if( $key == 1 ) id="view-more-link" @endif
                    @if( $key > 1 ) x-show="viewMore" @endif
                    class="category relative flex flex-col justify-end min-h-[430px] md:min-h-[400px] @if( $key == 2 ) lg:!flex @endif"
                    >
                    <div class="absolute w-full top-0 bottom-0 left-0 rounded-2xl image-wrapper gradient-pink">                        
                        <x-webp-image :image-path="$landing['image']" :webp-image-path="$landing['webp_image']" class="object-bottom" />
                    </div>
                    <div class="relative px-5 py-7">
                        <h5 class="font-fredoka-semibold text-3xl text-white text-left font-semibold mb-3">{!! __('landing-cars.otherlandings-'. $landing['type'] .'-name') !!}</h5>
                        <p class="text-white">{!! __('landing-cars.otherlandings-'. $landing['type'] .'-text') !!}</p>
                    </div>
                </a>
            @endforeach
        </div>
        
        <div class="categories__button w-full text-center mt-5
            @if(count($otherlandings) < 3)
                hidden
            @endif
            @if(count($otherlandings) == 3)
                lg:hidden
            @endif
            ">
                <a href="#view-more-link" x-on:click="viewMore = ! viewMore" class="inline-flex" x-bind:class="viewMore ? 'flex-col-reverse' : 'flex-col'">
                    <span class="text-lg font-bold" x-text="viewMore ? '{{ __('landing-cars.otherlandings-view-less') }}' : '{{ __('landing-cars.otherlandings-view-more') }}'"></span>
                    <img x-bind:src="viewMore ? '{{ asset('/images/icons/view-less.svg') }}' : '{{ asset('/images/icons/view-more.svg') }}'" class="mx-auto" alt="">
                </a>
        </div>
        
    </div>
</section>