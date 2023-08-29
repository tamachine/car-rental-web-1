{{-- top row time and categories --}} 
<div class="flex justify-between flex-wrap gap-3 md:gap-0 md:flex-nowrap">
    <div>        
        <x-reading-time-icon :text="$blogPost->content" />
    </div>
    <div class="flex gap-1 flex-wrap">
        @foreach($blogPost->tags as $tag)            
            <x-blog-tag :blog-tag="$tag" />
        @endforeach                
    </div>
</div>