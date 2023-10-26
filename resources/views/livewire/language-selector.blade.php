<div
    class="rounded-b-xl shadow-xl bg-white font-fredoka text-xl md:text-base h-full"
    x-on:click.away="close()"
    >
    <div class="md:p-8 md:pb-4 px-8">
        <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-x-12 gap-y-2 md:gap-y-0 w-fit mx-auto">
            <div class="my-6 md:my-0 md:text-left text-center relative">
                <span>{!! __('general.languages-language') !!}</span>
                <div class="md:hidden absolute top-1 -left-4" x-on:click="close()">
                    <img src="{{ asset('images/icons/back.svg') }}" />
                </div>
            </div>
            <div
                class="grid md:grid-cols-[auto_1fr_auto_1fr_auto_1fr] grid-cols-[auto_1fr_auto_auto] gap-y-5 md:px-0 px-6"
                x-data="selectOption({ selectedOption: '{{ App::getLocale() }}' })"
                >
                @foreach(App\Helpers\Language::availableLanguages() as $code => $language)
                    <img class="md:pl-6 pr-2" src="{{ asset('images/flags/'.$code.'.svg') }}" />
                    <a
                        href="javascript:void(0)"
                        class="hover:text-pink-red"
                        :class="selectedOption == '{{ $code }}' ? 'text-pink-red' : 'text-black-primary'"
                        x-on:click="select('{{ $code }}')"
                        wire:click.prevent="changeLanguage('{{ $code }}', '{{ LaravelLocalization::getLocalizedURL($code) }}')"
                        >
                        {!! __('general.languages-'.$code) !!}
                    </a>
                @endforeach
            </div>
            <div class="mt-12 md:text-left text-center">{!! __('general.languages-currency') !!}</div>
            <div class="
                md:mt-12 mt-6
                md:px-0 px-12
                grid
                gap-y-5 md:gap-y-0
                md:grid-cols-[auto_1fr_auto_1fr_auto_1fr_auto_1fr] grid-cols-[auto_1fr_auto_auto]
                font-cabin-semibold
                md:text-base text-lg
                text-black-primary
                w-full"
                x-data="selectOption({ selectedOption: '{{ selectedCurrency() }}' })"
            >
                @foreach($currencies as $currency)
                    <img class="md:pl-6 pr-2" src="{{ asset('images/currencies/'.strtolower($currency).'-red.svg') }}" />
                    <a
                        href="javascript:void(0)"
                        :class="selectedOption == '{{ $currency }}' ? 'text-pink-red' : 'text-black-primary'"
                        x-on:click="select('{{ $currency }}')"                        
                        wire:click="changeCurrency('{{ $currency }}', '{{ LaravelLocalization::getLocalizedURL(App::getLocale()) }}')"
                        >
                        {{ strtoupper($currency) }}
                    </a>
                @endforeach
            </div>
            <div></div>
            <div class="
                    mt-6 md:mt-2
                    md:px-0 px-10
                    flex justify-center
                    w-full
                    text-sm md:text-xs
                    text-center md:text-left
                    font-medium"
                    >
                    {!! __('general.languages-remember') !!}
            </div>
            <button
                class="md:hidden inline-block btn btn-red mt-7 py-3 font-sans font-bold"
                x-on:click="close()"
                >
                {!! __('general.languages-apply') !!}
            </button>
        </div>
    </div>
</div>
