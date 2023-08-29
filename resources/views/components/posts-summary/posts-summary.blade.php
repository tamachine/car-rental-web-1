@if($blogPosts->count())
    <section>
        <div class="mb-7 flex justify-between items-end">
            <div class="font-fredoka-semibold text-pink-red text-4xl">{!! $title !!}</div>
            @if($viewAllHref)
                <a href="{{ $viewAllHref }}" class="flex-shrink-0 bg-pink-red text-white rounded-md p-2 font-sans-medium text-xs w-16">{!! __('blog.view-all-btn') !!}</a>
            @endif 
        </div>
        <div class="flex flex-col gap-7 md:gap-6">
            @if($blogPosts->first())               
                <x-posts-summary.featured-post :blogPost="$blogPosts->first()"/>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-7 md:gap-4 justify-start">
                @foreach($blogPosts->skip(1)->take(3) as $blogPost)
                    @include('components.posts-summary.post')
                @endforeach 
            </div>
        </div>
    </section>
@endif