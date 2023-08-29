<div class="mb-20 mt-14 md:mb-14 {{ $hero->count() > 0 ? 'md:mt-10' : 'md:mt-20' }}">
    <x-blog-filters :tags="$tags"/>
</div>