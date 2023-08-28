@if ($reversed) 
    <div class="flex flex-col md:flex-row-reverse md:text-left gap-5 md:gap-12 lg:gap-20 items-start lg:items-stretch">    
        <div class="image-wrapper md:flex-1 md:rounded-2xl w-full">                  
            <x-webp-image :image-path="$imagePath" :webp-image-path="$webpImagePath" />
        </div>
        <h2 class="md:hidden block md:text-left">{!! $title !!}</h2>
        <div class="md:flex-1 flex flex-col md:items-start gap-7">
            <h2 class="hidden md:block md:text-left">{!! $title !!}</h2>
            <div>
                <x-read-more-block text="{!! $text !!}" />    
            </div>
            <button class="tab hidden md:block">{!! __('home.feature-more') !!}</button>
        </div>
    </div>
@else
    <div class="flex flex-col md:flex-row md:text-right gap-5 md:gap-12 lg:gap-20 items-start lg:items-stretch">    
        <div class="image-wrapper md:flex-1 md:rounded-2xl w-full">              
            <x-webp-image :image-path="$imagePath" :webp-image-path="$webpImagePath" />  
        </div>

        <div class="md:flex-1 flex flex-col md:items-end gap-7">
            <h2 class="md:text-right md:pr-0 pr-28">{!! $title !!}</h2>
            <div class="">
                <x-read-more-block text="{!! $text !!}" :reverse-text-align=true />    
            </div>
            <button class="tab hidden md:block">{!! __('home.feature-more') !!}</button>
        </div>
    </div>
@endif



