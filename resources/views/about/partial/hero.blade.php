<div class="relative w-fill-screen h-[600px] md:h-[770px]">
    <div class="bg-image image-wrapper
        before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-2/3 
        before:bg-gradient-to-b before:from-white before:to-transparent">
            <x-webp-image :image-path="asset('images/about/about-top.jpg')" :webp-image-path="asset('images/about/about-top.webp')" class="object-[50%_30%]" />
        </div>
    <div class="relative h-full">
        <h1 class="max-w-[960px] text-center title-shadow text-white text-[34px] md:text-5xl lg:text-6xl !leading-tight mx-auto pt-40 px-4 md:px-10">{!! __('about.title') !!}</h1>
    </div>
</div>