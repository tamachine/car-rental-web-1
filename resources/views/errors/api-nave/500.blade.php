<!DOCTYPE html>
<html >
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

        {{-- <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ url(mix('js/scripts.js')) }}"></script> --}}

        {{-- app locale --}}
        <input type="hidden" id="app_locale" value="{{ App::getLocale() }}">
        <nav class="max-w-7xl mx-auto flex items-center justify-between flex-wrap p-3 md:px-4 md:py-5 border md:border-0 border-[#E7ECF3] bg-white sticky top-0">
            <a href="{{ env('APP_URL') }}" class="font-fredokaOne text-pink-red font-normal text-[26px] md:text-2xl lg:text-3xl leading-9">
                Iceland Cars
            </a>
         </nav>
    </head>

    <body>       

        <div class="max-w-7xl mx-auto">
            <div class="h-[calc(100vh_-_62px)] md:h-[calc(100vh_-_76px)] w-fill-screen text-white">
                <div class="bg-image image-wrapper">
                    <x-image path="images/404.jpg"/>
                </div>
                <div class="relative flex md:flex-row flex-col justify-between md:justify-center mx-auto w-full md:h-auto h-full gap-1 md:gap-6 items-center md:text-left text-center md:p-0 pb-10">
                    <div class="text-[128px] md:text-[220px] font-fredoka-semibold flex flex-col">
                        <div>500</div>
                        <div class="max-w-[240px] md:max-w-md flex md:hidden text-lg title-shadow font-fredoka-medium">
                            Our trolls are in trouble, we hope they go back to sleep soon.
                        </div>
                    </div>
        
                    <div class="max-w-[240px] md:max-w-md">
                        <div class="hidden md:flex text-lg title-shadow font-fredoka-medium">
                            Our trolls are in trouble, we hope they go back to sleep soon.
                        </div>
        
                        <div class="mt-6 font-sans-bold">
                            <button class="btn btn-red font-sans-bold py-3 px-10" onclick='window.location.href="{{ env('APP_URL') }}"'>Go to homepage</button>
                        </div>
                    </div>
                </div>        
            </div>       
        </div>
    </body>
</html>