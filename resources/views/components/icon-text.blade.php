<div class="flex {{ $isColumn ? 'md:flex-col' : 'md:flex-row' }} flex-row items-center h-full w-max md:w-full md:gap-0 gap-2 justify-around">
    <img class="{{ $iconClasses }}" src="{{ $iconPath }}" />
    <span class="font-fredoka-medium text-base leading-tight text-center">{!! $text !!}</span>
</div>