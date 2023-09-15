<section>
    <x-breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-heading-title title="{!! $title !!}" subtitle="{!! $subtitle !!}" />

    <div class="py-20">
        <x-blog-filters :tags="$tags" active-tag-hashid="{{ $tagHashid }}" />
    </div>   

    <x-wire-spinner /> 

    <div class="flex flex-col gap-14">
              
        @foreach($posts as $post)                        
            <x-posts-summary.featured-post :blogPost="$post"/>
        @endforeach

        {{ $posts->links('livewire.pagination', ['customUrl' => $urlForPagination]) }}

    </div>

</section>

