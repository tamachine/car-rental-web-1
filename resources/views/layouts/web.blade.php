<!DOCTYPE html>
<html
    lang="{{ app('getHTMLLang', [$seoConfigurations])  }}"
    x-data="{'showMobileNavBar': false, 'htmlOverflowHidden': false}"
    :class="htmlOverflowHidden || showMobileNavBar ? 'overflow-hidden' : ''"
    x-ref="html"
    >
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#E11166" >
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- TODO
        <x-seo-tags />

        <x-seo-schemas />

        <x-hreflang-tags />
        

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="preload" href="/css/preload.css" as="style" />
        
        --}}
        <link href="/css/app.css" rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        {{-- TODO
        <script src="{{ url(mix('js/swiper.js')) }}"></script>
        <script src="{{ url(mix('js/app/scripts.js')) }}"></script>

        <script async src="//www.instagram.com/embed.js"></script>
        --}}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- app locale --}}
        <input type="hidden" id="app_locale" value="{{ App::getLocale() }}">

        {{-- TODO
        <x-nav-bar/>     
        --}}   
    </head>

    {{--
        Horizontal overflow is hidden because w-fill-screen class uses a width=100vw and some browsers include the vertical scrollbar in the full screen size so a horizontal scrollbar is shown if a verticall one is needed.
    --}}

    <body
        class="overflow-x-hidden relative"
        x-data="{'showOverlay': false}"
        >

        {{-- <div
            id="overlay"
            class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-20"
            x-show="showOverlay"
            x-cloak
            >
            <div id="hide-overlay" class="hidden" x-on:click="showOverlay = false"></div> 
        </div> --}}       

        <div class="max-w-7xl mx-auto">
            @yield('body')

            @livewireScripts
            {{-- The livewire_app_url var is a fix for the issue: When a Livewire component makes a request after the page has been loaded, it changes the current locale to a different locale. --}}
            <script>
                window.livewire_app_url = "{{ \Illuminate\Support\Facades\Request::getSchemeAndHttpHost() }}/{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}"
            </script>

            {{-- TODO 
            @if (isset($footerImagePath))
                <x-footer imagePath="{{ $footerImagePath }}" />
            @endif
            --}}
        </div>

        @stack('scripts')
    </body>
</html>
