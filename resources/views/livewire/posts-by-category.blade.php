<div class="flex flex-col gap-20">
    @foreach($categoriesWithPosts as $category)
        <x-posts-summary :blog-posts="$category->postsPublished()" :title="$category->name" :view-all-href="route('blog.search.category', $category->slug)"/>
    @endforeach

    {{ $categoriesWithPosts->links('livewire.pagination', ['customUrl' => route('blog')]) }}

</div>