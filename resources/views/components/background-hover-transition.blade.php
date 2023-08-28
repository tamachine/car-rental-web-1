<div {!! $attributes->merge(['class' => 'bg-image image-wrapper']) !!}>
    @if($image)        
    <x-webp-image :imagePath="$image" class="relative" />
    @endif
    
    @if($hover != '')        
        <x-webp-image :imagePath="$hover" class="image-hover absolute top-0 left-0 bottom-0 w-full" />
    @endif
</div>