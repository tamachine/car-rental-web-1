@pushOnce('scripts')
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
@endPushOnce

<div 
    x-data="reviewsInfoWidget( { 
            reviewsText: '{{ __('reviews.reviews') }}', 
            reviewsClasses: 'mt-auto font-sans-medium md:font-sans leading-mini', 
            flexGapClass: 'gap-2'
        } )"         

    >
    <div         
        x-show="visibility()"
        x-ref="widget" 
        class="{{ $tokenClass }} md:border-0 border border-gray-secondary rounded-xl">
    </div>
    <div
        x-show="!visibility()"
        >
        <img class="w-16" src="{{ asset('images/icons/spinner.svg') }}" />
    </div>
</div>


{{-- for now, we are going to use a widget to show reviews. To customize the css, we are using the schema that the widget adds so we can get the data --}}