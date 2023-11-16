<footer class="max-w-6xl mx-auto pt-28 md:pt-36">
    <div class="px-3 sm:px-8 md:px-10 pb-5 md:pb-0 text-pink-red text-5xl md:text-8xl text-center md:text-left font-semibold leading-[50px] md:leading-[110px] font-fredoka-semibold">
        {!! __('footer.title') !!}
    </div>
    <div
        before=""
        class="relative before:content-[attr(before)] pt-28 md:pt-0 before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:z-0 md:before:bg-footer-image-pattern before:bg-footer-image-pattern-mobile w-fill-screen">
                       
            <x-webp-image :imagePath="$imagePath"  :webpImagePath="$webpImagePath" class="w-full h-[587px] md:h-auto object-cover" />
            
            <div class="absolute md:top-[5%] top-0 left-0 right-0 bottom-0 z-10 text-lg">
                <div class="max-w-6xl mx-auto px-3 sm:px-8 md:px-14">
                    <div class="max-w-xs text-center md:text-left mx-auto md:mx-0">
                        <span>{!! __('footer.text') !!}</span>                        
                    </div>
                </div>
            </div>
            
    </div>
    <div class="bg-[#070000] w-fill-screen">
        <div class="max-w-6xl mx-auto px-1 md:py-3">
            <div class="relative bg-[#1C1C1C] flex flex-col gap-5 md:gap-0 md:flex-row flex-between items-center text-[#8c8c8c] rounded-xl px-3 sm:px-8 md:px-9 py-7">
                
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
                    <x-wire-spinner /> 
                </div>

                <livewire:modal wire:key="modalFooter" modalId="modalFooter" :modal-title="__('newsletter.email_sent-title')" :modal-text="__('newsletter.email_sent-text')" />

                <div class="flex-1 flex flex-col w-full">
                    <div class="font-fredoka-medium font-medium text-2xl text-white">{!! __('footer.newsletter-title') !!}</div>
                    <div class="text-[#8c8c8c] md:text-base text-sm">{!! __('footer.newsletter-text') !!}</div>
                </div>

                <livewire:newsletter-submit 
                    wire:key="newsletter-submit-footer"
                    containerClass="flex-1 w-full flex rounded-[10px] border border-gray-secondary/50 px-3 py-1.5" 
                    inputClass="text-white bg-transparent w-full p-0 border-none placeholder:text-[#7E838F] placeholder:text-base focus:border-none focus:ring-0"
                    buttonClass="btn btn-red px-7 md:px-6 py-3 md:py-3 text-sm font-sans-medium font-medium rounded-md"
                    buttonText="{!! __('footer.newsletter-form-submit') !!}"
                    modalId="modalFooter"
                />                
            </div>

            <div class="
                grid grid-cols-2 gap-10 md:gap-0 md:flex md:justify-between
                w-full
                font-medium text-gray-secondary text-sm md:text-base
                px-3 sm:px-8 md:px-14 py-12"
                >
                @foreach($items as $item)
                <div>
                    <div class="font-fredoka-semibold text-xl text-white pb-6">{!! $item['title'] !!}</div>
                    <ul class="font-sans-medium font-medium flex flex-col gap-4">
                    @foreach ($item['items'] as $item)                        
                        <li><a target="_blank" href="{{ $item['href'] }}" alt="{!! $item['text'] !!}" class="hover:text-pink-red">{!! $item['text'] !!}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endforeach                
            </div>

            <div class="
                grid grid-cols-[auto_1fr] md:grid-cols-[1fr_auto_1fr] justify-center items-center gap-y-10 md:gap-0
                px-3 sm:px-8 md:px-[14px] pb-10 md:pb-7"
                >
                <div class="flex flex-col">
                    <div><img class="max-w-[150px]" src="{{ asset('images/iceland-cars-logo.svg') }}" /></div>
                    <div class="text-sm text-[#8c8c8c] hidden md:block">{!! __('footer.copyright') !!}</div>
                </div>
                <div class="flex gap-2 2sm:gap-4 justify-end md:justify-center">
                    <x-social color="white"/>
                </div>
                <div class="ml-auto col-span-2 md:col-auto text-center md:text-right w-full">
                    <img class="inline" src="{{ asset('images/icons/cards/master-card.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/maestro.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/visa.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/american-express.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/discover.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/union-pay.svg') }}" />
                    <img class="inline" src="{{ asset('images/icons/cards/jcb.svg') }}" />

                    <div class="text-sm text-[#8c8c8c] md:hidden pt-4 md:pt-0">{!! __('footer.copyright') !!}</div>
                </div>
            </div>
        </div>
    </div>
</footer>
