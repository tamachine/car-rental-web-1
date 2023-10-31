<section id="about" class="sm:flex gap-10 my-28 md:my-36">
    <div class="about__image sm:w-[50%] lg:w-[44%] rounded-2xl order-1 image-wrapper">
        <x-webp-image :image-path="asset('images/landing-cars/about-car-renting.jpg')" :wep-image-path="asset('images/landing-cars/about-car-renting.webp')"/>
    </div>
    <div class="about__content sm:w-[50%] lg:w-[56%] my-5">
        <x-read-more-block text="{!! __('landing-cars.about-text') !!}" image-path="/images/icons/arrow-down-solid.svg"/>
        {{-- 
            no button for now
            <a class="btn-border hidden" href="">{{ __('landing-cars.about-button') }}</a>
        --}}
    </div>
</section>