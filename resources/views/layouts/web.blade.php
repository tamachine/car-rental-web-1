<!DOCTYPE html>
<html
    lang="{{ app('getHTMLLang', [$seoConfiguration])  }}"
    x-data="{'showMobileNavBar': false, 'htmlOverflowHidden': false}"
    :class="htmlOverflowHidden || showMobileNavBar ? 'overflow-hidden' : ''"
    x-ref="html"
    >
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#E11166" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <x-seo-tags :seoConfiguration="$seoConfiguration" />
        
        <x-seo-schemas :seoConfiguration="$seoConfiguration" />
       
        <x-hreflang-tags />
                       
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
                
        <link rel="stylesheet"  href="https://rsms.me/inter/inter.css"> {{-- fonts --}}
        <link rel="preload"     href="/css/preload.css" as="style" />
        <link rel="stylesheet"  href="/css/app.css" >

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ url(mix('js/scripts.js')) }}"></script>

        {{-- TODO
        <script src="{{ url(mix('js/swiper.js')) }}"></script>
        <script async src="//www.instagram.com/embed.js"></script>
        --}}
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <input type="hidden" id="app_locale" value="{{ App::getLocale() }}"> {{-- app locale --}}

        <x-nav-bar/>     

    </head>

    {{--
        Horizontal overflow is hidden because w-fill-screen class uses a width=100vw and some browsers include the vertical scrollbar in the full screen size so a horizontal scrollbar is shown if a verticall one is needed.
    --}}

    <body
        class="overflow-x-hidden relative"
        x-data="{'showOverlay': false}"
        >      

        <div class="max-w-7xl mx-auto">
            @yield('body')

            @livewireScripts                     
            
            @if (isset($footerImagePath))
                <x-footer :imagePath="$footerImagePath" :webp-image-path="$footerWebpImagePath" />
            @endif            
        </div>

        @stack('scripts')
    </body>
</html>
