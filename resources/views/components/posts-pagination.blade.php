<section x-data="visibilitySelector()" class="rounded-lg">
    <div class="flex {{ $side == 'right' ? 'flex-row-reverse' : 'flex-row'}} items-center h-[200px] w-80" x-on:mouseleave="close()">
        <div x-on:mouseover="open()" >
            <button class="font-sans-bold text-sm hover:text-pink-red w-16" onclick="window.location.href='{{ $blogPost->url }}'"> {{ $text }} </button>
        </div>
        <div 
            x-cloak 
            x-show="visibility()"
            x-transition
            class="
                flex flex-col           
                bg-white rounded-lg
                w-80
                shadow-2xl
                "
        >
            <div class="relative h-[200px] w-80 rounded-t-lg overflow-hidden"
            >
                <div class="bg-image image-wrapper">                    
                    <x-webp-image :image-path="$blogPost->getFeaturedImageModelImageInstance->url" :webp-image-path="$blogPost->getFeaturedImageModelImageInstance->webp_url"/>
                </div>
                <div class="relative bg-black/50 h-full w-full p-5 rounded-lg">
                    <div class="flex flex-col justify-start items-start h-full">
                        <x-reading-time-icon :text="$blogPost->content" />
                    </div>
                </div>
            </div>

            <div class="p-6 flex flex-col gap-4">
                <div class="font-fredoka-semibold text-2xl ">{!! $blogPost->title !!}</div>    
                <div class="font-sans text-sm line-clamp-3">{!! $blogPost->summary !!}</div>    
                <div class="font-sans-bold">
                    <button class="btn btn-red py-3 w-full text-base" onclick="window.location.href='{{ $blogPost->url }}'">{{ __('blog.pagination-btn') }}</button>
                </div>                    
            </div>
            
        </div>
    </div>     
</section>