<div x-on:click="{{$click}}" 
    :class="showBack ? '' : 'hidden'"
    class="absolute top-3 left-3 w-5 h-5 md:hidden">
        <img class="mx-auto" src="{{ asset('images/icons/back.svg') }}" />
</div>