@foreach(['x-default', App\Helpers\Language::defaultCode()] as $hreflang)
    <link rel="alternate" hreflang="{{ $hreflang }}" href="{{ LaravelLocalization::getLocalizedURL(false, url()->current(), Route::current()->parameters(), false) }}" />
@endforeach

@foreach(App\Helpers\Language::availableCodes() as $code)
    @if($code != App\Helpers\Language::defaultCode())    
        <link rel="alternate" hreflang="{{ $code }}" href="{{ LaravelLocalization::getLocalizedURL($code, null, Route::current()->parameters(), true) }}" />
    @endif
@endforeach