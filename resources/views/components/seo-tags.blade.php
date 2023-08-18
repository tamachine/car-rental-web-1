@if($seoConfiguration)
    @if($seoConfiguration->nofollow && $seoConfiguration->noindex)
        <meta name="robots" content="nofollow, noindex">
    @elseif($seoConfiguration->nofollow)
        <meta name="robots" content="nofollow">
    @elseif($seoConfiguration->noindex)
        <meta name="robots" content="noindex">
    @endif    

    @if(!empty($seoConfiguration->meta_title))
        <title>{{ $seoConfiguration->meta_title }}</title>
    @else
        @include('layouts.partials.default-web-title')
    @endif

    @if(!empty($seoConfiguration->meta_description))
        <meta name="description" content="{!! $seoConfiguration->meta_description !!}">
    @endif   

    @if(!empty($seoConfiguration->canonical))
        <link rel="canonical" href="{!! $seoConfiguration->canonical !!}" />
    @endif
@else
    @include('layouts.partials.default-web-title')
@endif