<div class="flex justify-start items-center gap-2 font-sans text-sm {{ $lightColors ? 'text-[#AAAAAA]' : 'text-black' }}  py-7">
    @foreach($breadcrumbs as $breadcrumb)
        @if($loop->last)
            {!! $breadcrumb->getText() !!}
        @else
            <a class="hover:underline {{ $lightColors ? 'text-white' : 'text-[#AAAAAA]' }}" href="{{ $breadcrumb->getLink() }}">{!! $breadcrumb->getText() !!}</a> <span><img src="{{ asset('images/icons/arrow-right-gray.svg') }}" /></span>
        @endif    
    @endforeach
</div>

