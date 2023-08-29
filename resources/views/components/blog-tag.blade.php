<button      
    wire:click="searchByTag('{{ $blogTag->hashid }}')"
    class="
        flex-shrink-0 font-sans-medium 
        bg-[{{ $blogTag->color->background }}] hover:bg-[{{ $blogTag->color->hover }}] 
        py-2 px-5 rounded-md text-xs text-black transition duration-300 
        {{ $active ? 'border border-pink-red' : 'border-0' }}
        "    
    onclick="{{ $onclick }}"
    >
    {{ $blogTag->name }} 
</button>
