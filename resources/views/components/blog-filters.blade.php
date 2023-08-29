<div class="flex flex-col gap-3">
    <div class="font-fredoka-semibold text-lg">{!! __('blog.view-by-tag') !!}</div>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-7 md:gap-[10px]">
        <div 
            class="flex gap-[10px] flex-row flex-nowrap overflow-x-auto scrollbar-none"                 
            >
            @foreach($tags as $blogTag)
                <x-blog-tag :blog-tag="$blogTag" active="{{ $activeTagHashid == $blogTag->hashid }}"/>
            @endforeach
        </div>
            
        <x-blog-search />    
    </div>
</div>