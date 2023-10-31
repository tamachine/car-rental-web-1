<section id="brands" class="my-28 md:my-36">
    <div class="brand__image w-fill-screen image-wrapper">
        <picture>
            <source srcset="{{ asset('/images/landing-cars/car-brands_dk.jpg') }}" media="(min-width: 600px)">
            <source srcset="{{ asset('/images/landing-cars/car-brands_mb.jpg') }}">
            <img src="{{ asset('/images/landing-cars/car-brands_dk.jpg') }}" alt="">
        </picture>
    </div>
    <div class="brands__content md:flex gap-20 mt-10">
        <div class="brands__text md:w-1/2 mb-10 md:mb-0">
            <h2 class="mb-5">{{ __('landing-cars.brands-title') }}</h2>
            <p>{!! __('landing-cars.brands-text') !!}</p>
            {{-- NOTA: Por el momento dejamos el botón comentado porque no hay una página a la que ir --}}
            <a class="btn-border hidden" href="">{{ __('landing-cars.brands-button') }}</a>
        </div>
        @php
            $brands = [
                'kia',
                'toyota',
                'suzuki',
                'dacia',
                'jeep',
                'mercedes-benz',
                'tesla',
                'land-rover',
                'subaru',
            ]
        @endphp
        <div class="brands__logos md:w-1/2 grid grid-cols-3 gap-5 md:gap-x-14 md:gap-y-10 justify-items-center">
            @foreach($brands as $brand)
                <img src="/images/logos/{{ $brand }}.svg" alt="">
            @endforeach
        </div>
    </div>
</section>