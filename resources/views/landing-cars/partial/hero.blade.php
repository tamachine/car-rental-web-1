 <section id="intro">
    <div class="relative min-h-[125vw] sm:min-h-[460px] md:min-h-[520px] lg:min-h-[700px]">    
        <div class="absolute w-full top-0 bottom-0 left-0 rounded-2xl image-wrapper">
            <picture>
                <source srcset="{{ asset('/images/landing-cars/' . $type . '-cars_dk.jpg') }}" media="(min-width: 600px)">
                <source srcset="{{ asset('/images/landing-cars/' . $type . '-cars_mb.jpg') }}">                
                <x-webp-image :image-path="asset('/images/landing-cars/' . $type . '-cars_dk.jpg')" :webp-image-path="asset('/images/landing-cars/' . $type . '-cars_dk.webp')" />
            </picture>
        </div>
        <div class="relative px-7 py-[6vw] md:p-20">
            <h1 class="max-w-4xl text-white mx-auto">{!! __('landing-cars.'. $type . '-title') !!}</h1>
        </div>
    </div>
    <div class="intro__description max-w-4xl mx-auto mt-5 mb-20 md:mt-10 text-center">
        <p class="text-xl leading-loose">{!! __('landing-cars.'. $type . '-text') !!}</p>
    </div>
</section>