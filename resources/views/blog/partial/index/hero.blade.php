<div class="w-fill-screen text-white relative">
    <div class="absolute top-0 left-0 z-10 w-full">
        <div class="max-w-7xl mx-auto">
            <div class="px-5 md:px-0 max-w-6xl mx-auto">
                <div class="flex justify-between">
                    <div>
                        <x-breadcrumb :breadcrumbs="$breadcrumbs" light-colors="{{ $hero->count() > 0 }}"/>
                    </div>
                    <div class="hidden md:block">
                        <div class="text-right py-7 text-sm">
                            {!! __('blog.by') !!} <a href="{!! $hero->first()?->author->url !!}" id="hero-blog-author" class="transition ease-in-out duration-200"> {!! $hero->first()?->author->name !!} </a> {!! __('blog.in') !!} <a id="hero-blog-category" href="{{ $hero->first()?->category->url }}"> {!! $hero->first()?->category->name !!} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 z-10 w-full">
        <div class="max-w-7xl mx-auto">            
            <div class="px-5 md:px-0 max-w-6xl mx-auto flex flex-row items-center">
                <div class="basis-1/2">
                    <button id="hero-blog-link" class="rounded-lg bg-white font-sans-medium text-pink-red px-7 py-2 cursor-pointer" onclick="window.location.href='{!! $hero->first()?->url !!}'">{!! __('blog.read-more') !!}</button>
                </div>
                <div class="basis-1/2 flex justify-end gap-2 py-10 md:py-[75px] hero-blog-pagination"></div>
            </div>
        </div>
    </div>
    
    <swiper-container
        init="false"
        id="hero-blog"
    >
    @foreach($hero as $post)
        <swiper-slide
            data-author="{!! $post->author->name !!}"
            data-category="{{ $post->category->name }}"
            data-url="{{ $post->url }}"
            data-category-url="{{ $post->category->url }}"
            data-author-url="{{ $post->author->url }}"
        >
            <div class="flex flex-col gap-4 h-[540px] md:h-[670px]">
                <div class="relative w-full h-full ">
                    <div class="bg-image image-wrapper
                        before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full 
                        before:bg-black/50">
                            <x-webp-image :image-path="$post->getFeaturedImageModelImageInstance->url" :webp-image-path="$post->getFeaturedImageModelImageInstance->webp_url"/>                            
                    </div>
                    <div class="relative max-w-7xl mx-auto h-full">
                        <div class="px-5 md:px-0 max-w-6xl mx-auto h-full pb-[50px]">
                            <div class="flex flex-col justify-end h-full py-10 md:py-[75px] gap-2 md:gap-5 md:max-w-[710px]">

                                <h1 class="text-white text-[40px] md:text-[64px] leading-[1.1em] text-left swiper-no-swiping">
                                    {!! $post->title !!}
                                </h1>

                                <div class="font-sans text-xs md:hidden swiper-no-swiping">    
                                    {{-- TODO                                   
                                    <x-blog-post-by :blogPost="$post" />
                                    --}}
                                </div>

                                <div class="font-sans-medium swiper-no-swiping">
                                    {!! $post->summary !!}
                                </div>                                
                            
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
            
        </swiper-slide>
    @endforeach
    </swiper-container>
</div>

@push('scripts')
    <script>
        initSwiper(
            '#hero-blog', 
            {
                pagination: {
                    el: '.hero-blog-pagination',
                    clickable: true,
                    bulletActiveClass: "hero-blog-bullet-active",
                    bulletClass: 'hero-blog-bullet',
                    renderBullet: function (index, className) {
                        if(this.slides.length > 1) {
                            return '<span class="' + className + '">' + (index + 1) + "</span>";
                        } else {
                            return '';
                        }
                    }
                },
                slidesPerView: 1,
                gridRows: 1,
                loop: true,
                grabCursor: true,
                mousewheelForceToAxis: true,
                on: {
                    slideChange() {
                        let dataset = this.slides[this.realIndex].dataset;

                        document.querySelector('#hero-blog-author').innerHTML   = dataset.author;
                        document.querySelector('#hero-blog-author').href        = dataset.authorUrl;
                        document.querySelector('#hero-blog-category').innerHTML = dataset.category;
                        document.querySelector('#hero-blog-category').href      = dataset.categoryUrl;
                        document.querySelector('#hero-blog-link').onclick       = function() { window.location.href = dataset.url; }

                        fadeOut(document.querySelector('#hero-blog-link'))
                                                
                        setTimeout(function() {
                            fadeIn(document.querySelector('#hero-blog-link'))                                                       
                        }, 200);                                               
                    },
                },
            }
        );
    </script>
@endpush
