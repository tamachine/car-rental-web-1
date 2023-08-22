<nav 
    x-data="navBar()"         
    @languageSelector-show="show()" 
    x-cloak 
    x-show="navbarVisibility()"
    class="max-w-7xl mx-auto flex items-center justify-between flex-wrap p-3 md:px-4 md:py-5 border md:border-0 border-[#E7ECF3] bg-white sticky top-0" 
    :class="scrollingUp() ? 'z-50 shadow-lg' : 'z-30'"
    x-transition.opacity.duration.500ms    
    x-on:click.away="clickAway()"
    x-ref='navbar'
    >
    <a href="{{route("home")}}" class="font-fredokaOne text-pink-red font-normal text-[26px] md:text-2xl lg:text-3xl leading-9">
        {{ __('general.brand') }}
    </a>

    {{-- mobile --}}
    <div
        class="cursor-pointer md:hidden font-sans-medium menu-selector"
        x-on:click="window.scrollTo(0, 0); showMobileNavBar = !showMobileNavBar;"
        >
        <div x-show="!showMobileNavBar">
            <span>{!! __('navbar.open') !!}</span>
            <img src="{{ asset('images/icons/menu.svg') }}" class="inline" />
        </div>

        <div x-cloak x-show="showMobileNavBar">
            <span>{!! __('navbar.close') !!}</span>
            <img src="{{ asset('images/icons/menu-close.svg') }}" class="inline" />
        </div>
    </div>
    {{-- mobile end --}}

    {{-- desktop --}}
    <div class="hidden md:flex items-center divide-x gap-10">
        <div class="flex items-end justify-between flex-wrap gap-6 lg:gap-10 text-base lg:text-lg font-sans-medium">
            <a href="{{ route('cars') }}" class="hover:text-pink-red">{!! __('navbar.cars') !!}</a>
            <a href="{{ route('about') }}" class="hover:text-pink-red">{!! __('navbar.about') !!}</a>
            <a href="{{ route('faq') }}" class="hover:text-pink-red">{!! __('navbar.faq') !!}</a>
            <a href="{{ route('blog') }}" class="hover:text-pink-red">{!! __('navbar.blog') !!}</a>
            <a href="{{ route('contact') }}" class="hover:text-pink-red">{!! __('navbar.contact') !!}</a>
        </div>
        <div class="pl-7 text-sm font-medium flex items-center gap-1" x-on:click="toggle()">
            <img class="inline" src='{{ asset("/images/currencies/".strtolower(selectedCurrency()).".svg") }}' />
            <img class="inline" src='{{ asset("/images/flags/".App::currentLocale().".svg") }}' />
            <img class="cursor-pointer language-selector" src="{{ asset('images/icons/arrow-down.svg') }}" />
        </div>
    </div>
    {{-- desktop end --}}

    <div
        class="md-max:hidden md:absolute top-[76px] right-16 z-50"
        x-cloak
        x-show="visibility()"
        >
        <livewire:language-selector />
    </div>
</nav>


{{-- mobile --}}
<div
    x-cloak
    class="
        md:hidden fixed w-screen top-[60px] left-0 h-[calc(100dvh_-_20px)] {{-- the screen, minus 60px for the top position, plus 20px for every bottom line (red and black) so -60 +20 +20 = 100dvh -20px --}}
        bg-white z-40 overflow-hidden"
    x-show="showMobileNavBar"
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="transform -translate-y-full opacity-[90%]"
    x-transition:enter-end="transform translate-y-0 opacity-full"

    x-transition:leave="transition ease-out duration-700"
    x-transition:leave-start="transform translate-y-0 opacity-full"
    x-transition:leave-end="transform -translate-y-full opacity-[90%]"
    x-data="navBar()"
    >
    <div class="flex flex-col h-full justify-between">
        <div class="h-full overflow-auto">
            <div class="flex flex-col divide-y h-full">
                <div class="h-full p-9 pb-0 flex flex-col items-center justify-around">
                    <div class="grid grid-cols-2 justify-center items-center text-center gap-y-8 gap-x-9">
                        @if (isset($carCategories))                        
                            @foreach($carCategories as $carType)
                            <div>
                                <img src="{{ $carType->imagePath }}" class="mx-auto" />
                                <span>{{ $carType->getTextTranslated() }}</span>
                            </div>
                            @endforeach
                        @endif

                        <div>
                            <a href="{{ route('cars') }}" class="btn font-fredoka font-medium text-sm text-black-primary p-4 border border-gray-secondary  focus:bg-gray-secondary cursor-pointer">{!! __('navbar.cars-button') !!}</a>
                        </div>
                    </div>

                    <div class="text-center text-pink-red font-fredoka-semibold text-[26px] py-5 h-full flex items-center justify-center">
                        {!! __('navbar.cars-title') !!}
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between flex-wrap text-xl font-fredoka font-medium">
                        <a href="{{ route('about') }}">{{ __('navbar.about') }}</a>
                        <a href="{{ route('faq') }}">{{ __('navbar.faq') }}</a>
                        <a href="{{ route('blog') }}">{{ __('navbar.blog') }}</a>
                        <a href="{{ route('contact') }}">{{ __('navbar.contact') }}</a>
                    </div>
                </div>
                <div class="font-fredoka-semibold text-center pt-5 pb-10">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]">{!! __('general.languages-language') !!}</div>
                            <div class="flex justify-center gap-2">
                                <img src="{{ asset('images/flags/'.App::getLocale().'.svg') }}" />
                                <span class="text-black-primary font-sans font-medium">{!! __('general.languages-'.App::getLocale()) !!}</span>
                                <img class="cursor-pointer language-selector-mobile" src="{{ asset('images/icons/arrow-down.svg') }}" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]">{!! __('general.languages-currency') !!}</div>
                            <div class="flex justify-center gap-2">
                                <img class="inline" src="{{ asset('images/currencies/'.selectedCurrency().'-red.svg') }}" />
                                <span class="text-black-primary font-cabin-semibold">{{selectedCurrency()}}</span>
                                <img class="cursor-pointer" src="{{ asset('images/icons/arrow-down.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-pink-red w-full h-5"></div>
        <div class="bg-black-primary w-full h-5"></div>
    </div>

    <div
        class="md:hidden fixed w-screen top-[60px] left-0 h-[calc(100dvh_-_20px)]" {{-- the screen, minus 60px for the top position, plus 20px for every bottom line (red and black) so -60 +20 +20 = 100vh -20px --}}
        x-cloak
        x-show="visibility()"

        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="transform -translate-y-full opacity-[90%]"
        x-transition:enter-end="transform translate-y-0 opacity-full"

        x-transition:leave="transition ease-out duration-700"
        x-transition:leave-start="transform translate-y-0 opacity-full"
        x-transition:leave-end="transform -translate-y-full opacity-[90%]"
        >
        <livewire:language-selector />
    </div>

</div>
{{-- mobile end --}}
