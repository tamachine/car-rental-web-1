@if ($faqs)
    <div x-data="{ tab: '#tab{{ $categories[0]->hashid }}' }"> 
        @if ($isFaqsPage)
            <div class="max-w-5xl mx-auto">
                <h1 class="mb-6 capitalize">
                    {{ __('home.faqs-title') }}
                </h1>
                <h2 class="font-sans font-normal text-black text-center text-xl md:text-2xl leading-snug">
                    {{ __('home.faqs-subtitle') }}
                </h2>
            </div>
        @else
            <x-heading-h2
                title="{{ __('home.faqs-title') }}"
                subtitle="{{ __('home.faqs-subtitle') }}"
            />
        @endif
        

        @if ($categories)
            <div class="{{ $isFaqsPage ? 'md:mt-8 mt-24' : 'mt-10 md:mt-12' }} flex md:justify-center justify-start gap-2 md:gap-5 w-full {{ count($categories) > 3 ? 'flex-wrap' : '' }} flex-nowrap overflow-auto scrollbar-none w-fill-screen md:w-full md:left-0 px-3">            
                @foreach($categories as $category)
                    <button class="tab w-[136px] h-[50px] p-0 flex-shrink-0 " @click.prevent="tab='#tab{{ $category->hashid }}'" :class="{ 'active': tab == '#tab{{ $category->hashid }}' }">{{ $category->name }}</button>
                @endforeach
            </div>
        @endif

        <div class="max-w-2xl m-auto {{ $isFaqsPage ? 'md:mt-20 mt-10' : 'md:mt-12 mt-14' }}">
            @foreach($categories as $category)
                <div 
                    x-show="tab == '#tab{{ $category->hashid }}'" 
                    class="grid grid-cols-1 divide-y"                                                        
                    >
                    @php($counter = 0)

                    @foreach($faqs as $faq)
                    
                        @if($faq->belongsToCategory($category->hashid)) 
                            
                            @php($counter++)
                            
                            <div class="py-4 md:py-9">
                                <x-accordion question="{!! $faq->question !!}" answer="{!! $faq->answer !!}" :group-id="'faqs-'.$category->hashid"/>
                            </div>
                            
                            @break($counter == $take)
                                                        
                        @endif                      
                        
                    @endforeach
                </div>
            @endforeach

            <div class="block md:hidden w-full border-t"></div>

            @if($showViewAllButton)
            <div class="flex justify-center py-7 md:py-3">                
                <a href="{{ route('faq') }}" class="tab">{{ __('home.faqs-view-all') }}</a>
            </div>
            @endif
        </div>
    </div>
@endif
