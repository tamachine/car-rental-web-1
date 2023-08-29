<div class="min-h-[530px] md:min-h-[560px] w-full relative rounded-xl overflow-hidden cursor-pointer
    {{ ($blogPost->featured_image_hover_url != '') ? 'hover-change-image' : 'hover-no-image' }}"
    x-on:click="window.location.href='{{ $blogPost->url }}'"
    >

    <x-background-hover-transition 
        :image="$blogPost->featured_image_url" 
        :hover="$blogPost->featured_image_hover_url"         
    />

    <div class="absolute top-0 left-0 z-10 w-full h-full">
        <div class="bg-black/50 h-full w-full p-3 sm:px-8 md:p-10 rounded-lg">
            <div class="flex flex-col justify-between h-full">
                @include('components.posts-summary.featured-post-top-info')

                @include('components.posts-summary.featured-post-bottom-info')
            </div>
        </div>
    </div>
</div>

