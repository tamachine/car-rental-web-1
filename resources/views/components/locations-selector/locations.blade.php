<div                 
{{ $attributes }}
>    
    <div {{ $layerId }}>
        @if ($title) 
            <h5 class="text-pink-red text-2xl text-left flex items-center">                    
                {!! $title !!}
            </h5>
        @endif

        <fieldset
            id="locations-{{ $type }}"   
            :class="{ '!flex': !sameLocation }"             
            class="flex gap-[4%] py-4 flex-nowrap justify-start 
            ">

            @foreach($locations as $key => $location)

                <div 
                    class="w-1/3"                         
                    >

                    <input 
                        type="radio" 
                        id="{{$type}}--{{ $key }}" 
                        name="location--{{$type}}" 
                        value="{{ $location->name }}" 
                        class="hidden"
                        x-on:change = "locationSelected('{{ $type }}', '{{ $location->hashid }}')"                            
                        >
                    
                    <label for="{{$type}}--{{ $key }}" class="group location flex flex-col cursor-pointer">

                        <div
                            :class="{ 'h-[75px]' : !sameLocation }" 
                            class="inline-block image-wrapper rounded-t-md overflow-hidden"
                            >      
                            @if($location->getFeaturedImageModelImageInstance->url) 
                            <x-webp-image :image-path="$location->getFeaturedImageModelImageInstance->url" :webp-image-path="$location->getFeaturedImageModelImageInstance->webp_url" class="w-full scale-105 group-hover:scale-[120%] transition-transform duration-700 " />                                             
                            @endif
                        </div>
                        
                        <div
                            :class="{ 'py-2' : !sameLocation, 'bg-pink-red' : selectedLocations['{{$type}}'] == '{{$location->hashid}}' }"  
                            class="group-hover:bg-pink-red bg-white px-5 py-4 rounded-b-md shadow-[0_1.5px_6px_0_rgba(0,0,0,0.1)] transition-[background] duration-500">
                            <p 
                                :class="{ 'text-white' : selectedLocations['{{$type}}'] == '{{$location->hashid}}' }" 
                                class="group-hover:text-white text-black text-sm text-center font-sans-bold transition-[color] duration-400">
                                {{ $location->name }}
                            </p>
                        </div>
                        
                        @if ($location->$locationInputInfoAttribute)
                            <small class="inline-block w-full text-gray-light text-xs text-center mt-3">                                    
                                {!! $location->$locationInputInfoAttribute !!}                                    
                            </small>
                        @endif

                    </label>
                </div>
            @endforeach
        </fieldset>
    </div>
</div>
