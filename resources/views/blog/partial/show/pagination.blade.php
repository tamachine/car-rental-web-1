@if($post->prev_post)
<div 
    class="hidden 7xl:inline-block absolute -left-32 transition-opacity opacity-0 disabled"     
    :class="{ 'opacity-100': paginationVisibility(), 'opacity-0 disabled' : !paginationVisibility() }"
>    
    <div class="fixed top-1/3" x-ref="prevElement">
        <x-posts-pagination :blogPost="$post->prev_post" side="left" />
    </div>
</div>
@endif

@if($post->next_post)
<div 
    class="hidden 7xl:inline-block absolute right-48 opacity-0 disabled"     
    :class="{ 'opacity-100': paginationVisibility(), 'opacity-0 disabled' : !paginationVisibility() }"
>    
    <div class="fixed top-1/3" x-ref="nextElement">
        <x-posts-pagination :blogPost="$post->next_post" side="right" />
    </div>    
</div>
@endif
