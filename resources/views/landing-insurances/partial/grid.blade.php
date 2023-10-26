<div class="mt-10 md:mt-36">
    <section class="grid grid-cols-1 md:grid-cols-2 md:gap-y-32 md:gap-x-14 gap-5">
        <div class="flex flex-col justify-center">
            <h2 class="text-5xl">
                {!! __('landing-insurances.grid-title') !!}
            </h2>
            <div class="mt-5 font-sans text-lg max-w-sm">
                {!! __('landing-insurances.grid-text-1') !!}
            </div>
        </div>
        <div class="hidden md:inline-block">
            <x-webp-image :image-path="asset('images/landing-insurances/grid-1.jpg')" :webp-image-path="asset('images/landing-insurances/grid-1.jpg')" />
        </div>
        <div>
            <x-webp-image :image-path="asset('images/landing-insurances/grid-2.jpg')" :webp-image-path="asset('images/landing-insurances/grid-2.jpg')" />
        </div>
        <div class="font-sans text-lg flex flex-col justify-center">
            <x-read-more-block text="{!! __('landing-insurances.grid-text-2') !!}" arrow-open="images/icons/arrow-red-down.svg" arrow-close="images/icons/arrow-red-up.svg" font-regular="true" text-size-class="text-lg"/>        
        </div>
    </section>
</div>