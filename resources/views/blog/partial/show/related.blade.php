@if ($related) 
    <section>
        <h2 class="font-fredoka-semibold text-5xl text-pink-red text-left">{{ __('blog.related-posts-title') }}</h2>
        <div class="font-sans text-2xl text-left pb-7 md:pb-16">{{ __('blog.related-posts-subtitle') }}</div>
        <div class="grid grid-rows-1 md:grid-cols-3 gap-10">
            @foreach($related as $blogPost)            
                <div 
                    class="relative flex flex-col justify-end min-h-[490px] rounded-2xl overflow-hidden
                    {{ ($blogPost->featured_image_hover_url != '' ? 'hover-change-image' : 'hover-no-image') }}"
                    x-data x-on:click="window.location.href='{{ $blogPost->url }}'" class="cursor-pointer"
                    >
                        <x-background-hover-transition 
                            :image="$blogPost->featured_image_url" 
                            :hover="$blogPost->featured_image_hover_url" 
                            class="gradient-pink"
                        />  
                        <div class="relative px-5 py-7 text-white drop-shadow-text">
                            <div class="font-fredoka-semibold text-3xl">{{ $blogPost->title }}</div>
                            <div class="font-sans-medium md:text-base text-lg">{{ $blogPost->summary }}</div>
                        </div>     
                </div>
            @endforeach
        </div>
    </section>
@endif