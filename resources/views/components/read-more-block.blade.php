<div x-data="{showReadMore: true}">
@if($reverseTextAlign)
    <p class="line-clamp-6 md:line-clamp-none text-base md:leading-[30px] md:text-right {{ $textSizeClass ? $textSizeClass : 'text-base' }}" :class="{ 'line-clamp-none': !showReadMore }">
@else
    <p class="line-clamp-6 md:line-clamp-none text-base md:leading-[30px] md:text-left {{ $textSizeClass ? $textSizeClass : 'text-base' }}" :class="{ 'line-clamp-none': !showReadMore }">
@endif
    
    {!! $text !!}
    </p>
    <div x-on:click="showReadMore = !showReadMore" class="md:hidden pt-6 cursor-pointer {{ $fontRegular ? 'font-sans' : 'font-sans-medium' }}">
        <p x-show="showReadMore" class="inline">{!! __('general.read-more') !!} </p>
        <img x-show="showReadMore" class="inline" src="{{ asset($arrowOpen) }}" />

        <p x-cloak x-show="!showReadMore" class="inline">{!! __('general.read-less') !!} </p>
        <img x-cloak x-show="!showReadMore" class="inline" src="{{ asset($arrowClose) }}" />
    </div>
</div>