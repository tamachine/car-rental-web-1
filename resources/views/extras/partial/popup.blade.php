<div 
    x-cloak
    x-show="show"
    class="        
    md:hidden absolute w-screen top-0 left-0 h-screen
    z-20 overflow-hidden    
    backdrop-blur-sm bg-black/70 text-white
    p-8
    "
    >

    <x-wire-spinner /> 

    <div
        wire:loading.remove       
        >
        @if($extraPopup)
        <div class="font-fredoka-semibold text-2xl mb-5">{{ $extraPopup['name'] }}</div>
        <img class="rounded-xl mb-3" src="{{ (!empty($extraPopup['featured_image_url'])) ? $extraPopup['featured_image_url'] : '#' }}" />
        <div class="font-sans-medium mb-8">{{ $extraPopup['description'] }}</div>
        @endif
        <div        
        x-on:click="close()"
        >
            <img class="mx-auto" src="{{ asset('images/icons/close.svg') }}" />
        </div>
    </div>
</div>