@props([
    'title',
    'text' 
])

<div 
    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full z-10" 
    x-data="visibilitySelector()" 
    x-show="!visibility()"
    x-cloak
    >        
    <div         
        class="w-1/2 z-20 bg-white shadow-2xl rounded-2xl p-10 mx-auto flex flex-col justify-center items-center gap-8"
        >
        <h4 class="text-pink-red">{!! $title !!}</h4>
        <div>
            {!! $text !!}
        </div>
        
        <button wire:click="closeModal()" x-on:click="toggle()" class="btn btn-red py-3 px-6 text-lg">{!! __('general.modal-ok') !!}</button>
    </div>                
</div>