@extends('layouts.web')

@section('body')        
    <div class="w-fill-screen mt-5">
        <main class="max-w-7xl mx-auto px-5 md:px-11">
            
            @include('landing-cars.partial.hero')

            <livewire:car-search-results 
                :showFilters="false" 
                :showImageIfLittleResults="true" 
                :categories="$categories" 
                :isLanding="true"
                />

            @include('landing-cars.partial.testimonials')

            @include('landing-cars.partial.about')

            @include('landing-cars.partial.brands')

            @include('landing-cars.partial.other-landings')            

            @include('home.partial.faqs')
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        initSwiper(
            '#testimonials__swiper', 
            {
                slidesPerView: 1,
                spaceBetween: 60,

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },
        );

    </script>
@endpush