<div {!! $attributes->merge(['class' => 'bg-image image-wrapper']) !!}>
    @if($image)    
    <img src="{{ $image }}"  class="relative" />
    @endif
    
    @if($hover != '')
        <img src="{{ $hover }}"  class="image-hover absolute top-0 left-0 bottom-0 w-full" />        
    @endif
</div>