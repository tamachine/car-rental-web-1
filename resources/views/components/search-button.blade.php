<button 
    type="submit"
    {{ $disabled ? 'disabled' : '' }}    
    id="{{ $id }}"

    {{ $attributes->merge(['class' => '
        w-full md:w-auto
        bg-pink-red hover:bg-pink-red-medium rounded-lg md:rounded-xl p-3 lg:px-10
        font-sans-bold text-white text-lg lg:text-xl
    ']) }}
    
    >
        {!! __('general.search') !!}    
</button>