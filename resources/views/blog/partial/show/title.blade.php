<div class="py-8 md:pt-16 flex flex-col gap-4 md:gap-8 justify-center items-center text-center">
    <h1 class="text-black-primary" >{{ $post->title }}</h1>
    <div class="text-[#9b9b9b]">
        <p>
            {{ __('blog.by') }} <a href="{{ $post->author->url }}" class="text-black"> {!! $post->author->name !!}</a>  {{ __('blog.in') }} <a href="{{ $post->category->url }}" class="text-black"> {!! $post->category->name !!} </a>
        </p>
        
        @if($post->show_date)
        <p class="text-black mt-1">
            @if ($post->updated_at > $post->published_at)
                <span>{{ $post->published_at?->format('d / m / Y') }}</span> - {{ __('blog.updated') }} {{ $post->updated_at?->format('d / m / Y') }}
            @else
                {{ $post->published_at?->format('d / m / Y') }}
            @endif
        </p>
        @endif
    </div>
</div>