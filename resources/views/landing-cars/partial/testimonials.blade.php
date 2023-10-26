<section id="testimonials" class="relative w-fill-screen sm:w-full sm:left-0 my-28 md:my-36">
    <swiper-container init="false" id="testimonials__swiper" class="">
        @foreach(range(0, 4) as $testimonial)
        <swiper-slide class="relative">
            <div class="testimonials__image relative sm:absolute sm:top-0 sm:left-0 w-[90%] sm:w-3/5 sm:h-full m-auto z-10 sm:z-0 rounded-2xl image-wrapper">
                <x-webp-image :image-path="asset('images/landing-cars/testimonial.jpg')" class="sm:absolute sm:top-0 sm:right-0 sm:bottom-0 sm:left-0" />
            </div>
            <div class="testimonials__content 
            relative flex flex-col gap-5 bg-pink-red-secondary rounded-2xl
            w-fill-screen sm:w-3/5 md:w-1/2 sm:left-0
            px-6 pt-20 pb-8 sm:p-8 md:p-12
            mt-[-45px] ml-auto sm:my-12 md:my-20 lg:my-32">
                <h3 class="sm:uppercase text-pink-red font-bold text-left text-xl sm:text-lg">{!! __('landing-cars.testimonials-title') !!}</h3>
                <h2 class="font-bold text-black text-3xl lg:text-5xl leading-tight">“Et officiis omnis unde suscipit rem et omnis rem laboriosam iure”</h2>
                <p class="font-bold text-base lg:text-2xl before:content-['-'] before:mr-2">Esther Molina</p>
                <div class="testimonials__reviews w-fill-screen sm:w-full sm:left-0 flex gap-1 sm:gap-2 items-center justify-center sm:justify-start flex-nowrap overflow-auto py-5">
                    <p class="text-xs font-bold">{!! __('landing-cars.testimonials-value') !!}</p>
                    <div class="flex gap-0.5">
                        @foreach(range(0, 4) as $item)
                        <div class="bg-[#219653] w-[20px] p-1">
                            <img class="brightness-0 invert" src="{{ asset('images/logos/trustpilot-icon.svg') }}" alt="Estrella Trustpilot">
                        </div>
                        @endforeach
                    </div>
                    <p class="text-xs whitespace-nowrap"><strong class="font-bold">436</strong> {!! __('landing-cars.testimonials-reviews') !!}</p>
                    <img class="w-[80px]" src="{{ asset('images/logos/trustpilot.svg') }}" alt="Logo Trustpilot">
                </div>
            </div>
        </swiper-slide>
        @endforeach
    </swiper-container>
    <div class="testimonials__navigation swiper-navigation sm:absolute sm:bottom-0 sm:right-0 mt-5 sm:mt-0 h-[36px] flex flex-row justify-center sm:justify-between gap-x-2">
        <div class="swiper-button-prev inline-block w-auto h-fit m-0 after:hidden">
            <img class="w-[36px] h-[36px]" src="{{ asset('images/icons/slider-prev.svg') }}" alt="">
        </div>
        <div class="swiper-button-next inline-block w-auto h-fit m-0 after:hidden">
            <img class="w-[36px] h-[36px]" src="{{ asset('images/icons/slider-next.svg') }}" alt="">
        </div>
    </div>
</section>