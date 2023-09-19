<div class="max-w-4xl mx-auto text-center">
    <h1 class="px-20 pb-5">{!! $title !!}</h1>
    @if($smallText)
    <h4 class="text-lg">{!! $text !!}</h4>
    @else
    <h4>{!! $text !!}</h4>
    @endif    
</div>