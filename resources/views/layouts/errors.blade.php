<!DOCTYPE html>
<html 
    lang="{{ App::getLocale()  }}"
    x-data="{'showMobileNavBar': false, 'htmlOverflowHidden': false}"
    :class="htmlOverflowHidden || showMobileNavBar ? 'overflow-hidden' : ''"
    x-ref="html"
    >
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#E11166" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <link rel="stylesheet"  href="https://rsms.me/inter/inter.css"> {{-- fonts --}}
        <link rel="preload"     href="/css/preload.css" as="style" />
        <link rel="stylesheet"  href="/css/app.css" >

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ url(mix('js/scripts.js')) }}"></script>

        {{-- app locale --}}
        <input type="hidden" id="app_locale" value="{{ App::getLocale() }}">

        <x-nav-bar/>        
    </head>

    <body>       

        <div class="max-w-7xl mx-auto">
            @yield('body')            
        </div>

        @stack('scripts')
    </body>
</html>
