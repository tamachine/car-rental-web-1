<div class="flex items-center justify-between border border-solid border-black-10 rounded-lg md:max-w-[376px] w-full h-fit">        
    <input                     
        type="search" 
        id="blog_search"
        name="blog_search"
        wire:model.debounce.200ms="search"
        wire:key="blog_search"
        placeholder="{{ __('blog-search.input') }}"
        class="border-none rounded-lg w-full focus:ring-0 focus:outline-transparent focus:border-0 focus:shadow-none text-base md:text-lg px-5"
        @keydown.enter="{{ $onclick ? 'handleClick' : '' }}"
        />
    <button                 
        class="text-pink-red px-5"
        @click="{{ $onclick ? 'handleClick' : '' }}"
        >
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M18.9998 19L13.8028 13.803M13.8028 13.803C15.2094 12.3965 15.9996 10.4887 15.9996 8.49955C15.9996 6.51035 15.2094 4.60262 13.8028 3.19605C12.3962 1.78947 10.4885 0.999268 8.49931 0.999268C6.51011 0.999268 4.60238 1.78947 3.19581 3.19605C1.78923 4.60262 0.999023 6.51035 0.999023 8.49955C0.999023 10.4887 1.78923 12.3965 3.19581 13.803C4.60238 15.2096 6.51011 15.9998 8.49931 15.9998C10.4885 15.9998 12.3962 15.2096 13.8028 13.803V13.803Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</div>

@push('scripts')

    <script>

        function handleClick(e) {
            window.location.href= "{{ route('blog.search.string') }}" + "?search=" + document.getElementById('blog_search').value;
        }

    </script>

@endpush