<section class="pt-8 md:pt-12">
    <div class="max-w-3xl mx-auto text-center">
        <h1 class="md:px-20 pb-5 text-[42px] md:text-7xl">{!! __('landing-insurances.title') !!}</h1>
        <h4 class="max-w-2xl mx-auto text-lg md:text-2xl">{!! __('landing-insurances.subtitle') !!}</h4>        
    </div>
        
    <div class="w-fill-screen md-w-fill-screen-inverse overflow-x-auto scrollbar-none md:mx-auto mt-8 md:mt-12">
        <div 
            class="
                flex items-center md:items-stretch gap-3 md:gap-8 justify-start
                h-full w-max
                rounded-lg"
            >
            @for ($i = 1; $i <= 7; $i++)
            <div class="h-[140px] w-[140px] rounded-lg overflow-hidden">
                <x-webp-image :image-path="asset('images/landing-insurances/intro-'.$i.'.jpg')" :webp-image-path="asset('images/landing-insurances/intro-'.$i.'.jpg')" />
            </div>
            @endfor  
        </div>        
    </div>
</section>