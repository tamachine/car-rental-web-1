<div class="flex gap-2">   
    @foreach($steps as $index => $item)
        <a href="{{ $index <  $active ? $item['url'] : 'javascript:void(0)'}}" 
            class="
                font-sans-medium
                text-xs                
                border border-black
                rounded-full
                flex
                items-center
                justify-center
                {{ $index <  $active ? 'cursor-pointer' : 'cursor-default'}}
                {{ $index <= $active ? 'bg-black text-white' : 'bg-white'}}
                {{ $index == $active ? 'px-2' : 'w-5 h-5' }}
                ">
            {{ $index }}
            @if($active == $index)
            . {{ $item['text'] }}
            @endif            
        </a>
    @endforeach
</div>