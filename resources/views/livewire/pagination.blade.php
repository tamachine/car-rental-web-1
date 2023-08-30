@if ($paginator->hasPages())
    <ul class="flex justify-around md:justify-center items-center gap-3 text-[#bcbcbc] font-fredoka-medium text-xl" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label=" < ">
                <button class="px-7 py-4 rounded-md disabled border" aria-hidden="true">
                    < 
                </button>
            </li>
        @else
            <li>
                <button type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="previousPage" rel="prev" aria-label=" < ">
                    < 
                </button>
            </li>
        @endif
 
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="px-7 py-4" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif
 
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    
                    @php($hrefUrl = $customUrl . '?' . http_build_query(array_merge(request()->query(), ['page' => $page]))) {{-- livewire returns a messing url so we have to pass the current url in order to show SEO urls in a tags: https://github.com/livewire/livewire/issues/663 --}}
                    
                    @if ($page == $paginator->currentPage())
                        <li class="px-7 py-4 text-pink-red" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li class="px-7 py-4 hover:text-pink-red">                            
                            @if($paginator->onFirstPage())
                                @if($url == $paginator->nextPageUrl())
                                    <a href="{{ $hrefUrl }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                @else
                                    <button type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</button>
                                @endif
                            @elseif($paginator->currentPage() == 2)                            
                                @if($url == $paginator->nextPageUrl() || $url == $paginator->previousPageUrl())
                                    <a href="{{ $hrefUrl }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                @else
                                    <button type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</button>
                                @endif
                            @elseif($paginator->currentPage() == $paginator->lastPage())                            
                                @if($url == $paginator->previousPageUrl() || $url == $paginator->url(1) || $url == $paginator->url($paginator->count() -1))
                                    <a href="{{ $hrefUrl }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                @else
                                    <button type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</button>
                                @endif
                            @else                                
                                <a href="{{ $hrefUrl }}" type="button" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                            @endif
                            
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
 
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button type="button" class="px-7 py-4 rounded-md border text-pink-red" wire:click="nextPage" rel="next" aria-label=" > ">
                    > 
                </button>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label=" > ">
                <span class="px-7 py-4 rounded-md disabled border" aria-hidden="true">
                    > 
                </span>
            </li>
        @endif
    </ul>
@endif