<div 
    class="flex flex-col md:flex-row w-full"  
    x-data="{ tooltip: false, tooltipHeight: 0, mobileTooltipTop: 36/2 }" {{-- 36 px are the top-9 class in the mobile tooltip --}}
    x-init="$nextTick(() => { tooltipHeight = getHiddenHeight($refs.mobileTooltip); });"
    >
    <div class="relative md:pl-20 md:pt-20 pt-40">
        <div
            class="
                absolute left-0 top-0 z-20 w-full "
                >
            <div
                class="
                md:mt-32 mx-6 md:mx-0 p-3 sm:px-8 md:p-4
                md:w-fit
                bg-pink-red-secondary
                md:rounded-2xl rounded-[10px]"
                >
                <div class="relative w-auto md:w-[500px] md:h-[270px] h-[180px] md:rounded-2xl rounded-[10px] overflow-hidden mx-auto">
                    <div class="bg-image image-wrapper
                        before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full 
                        before:bg-black before:opacity-20">                            
                            <x-webp-image :image-path="asset('images/home/location.png')"/>
                    </div>
                    <div class="relative md:p-6 p-3 flex flex-col justify-between h-full">
                        <div class="text-white font-fredoka-medium font-medium">
                            <div class="text-base md:text-2xl">
                            {!! __('home.location-map-title') !!}
                            </div>
                            <div class="text-xs md:text-lg">
                            {!! __('home.location-map-address') !!}
                            </div>
                        </div>
                        <div>
                            <div class="font-sans-medium font-medium bg-white text-black-primary text-[10px] leading-4 md:leading-6 md:text-xs rounded px-3 py-1 w-fit">
                            {!! __('home.location-map-time') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center md:px-4 pt-3 md:text-lg text-base flex-wrap font-fredoka-medium font-medium">
                    <div>
                        <img src="{{ asset('images/icons/phone-red.svg') }}" class="inline pr-1 md:pr-2 w-5 md:w-auto" /><span class="relative top-0 md:top-[2px]">{!! __('home.location-map-phone') !!}</span>
                    </div>
                    <div class="text-xs md:text-lg">
                        <img src="{{ asset('images/icons/envelope-red.svg') }}" class="inline pr-1 md:pr-2 w-6 md:w-auto" /><span>{!! __('home.location-map-email') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full relative
        before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-[140px]
        before:bg-gradient-to-b before:from-white before:via-[20%] before:via-white before:to-transparent before:z-10">
        <div class="md:rounded-2xl rounded-[10px] p-3 sm:px-8 md:p-5 pb-7 border-[#E7ECF3] border">
            <div
                id="location-map"
                class="h-[335px] md:h-[500px] w-full md:rounded-2xl rounded-[10px] "
                >
            </div>
            <div class="font-sans-medium font-medium">
                <div class="text-pink-red text-xl md:text-xl pt-7 pb-5 text-center md:text-left">{!! __('home.location-map-hours-title') !!}</div>
                
                <div class="font-sans-bold text-lg">{!! __('home.location-map-open24') !!}</div>
                
                <div class="flex justify-start items-center gap-1 relative">
                    <span class="text-sm mt-2 md:mt-1">{!! __('home.location-map-see-all-hours') !!}</span>
                    
                    <div class="relative flex">

                        <img class="w-5 md:w-4 cursor-pointer" src="{{ asset('images/icons/info-black.svg') }}" x-on:click="tooltip = true"  />
                        
                        <div class="hidden md:block md:absolute md:top-0 md:left-5">
                            @include('home.partial.location-map-tooltip-info')
                        </div>
                                                
                    </div>

                    <div class="md:hidden block absolute top-9 w-full">
                        @include('home.partial.location-map-tooltip-info', ['ref' => 'mobileTooltip'])
                    </div>
                    
                </div>
                 
            </div>
        </div>
    </div>

    {{-- this div is used to expand the content below the tooltip modal when the modal is open in mobile version --}}
    <div x-cloak x-show="tooltip" class="bg-white" :style="tooltip ? ('height: ' + (tooltipHeight - mobileTooltipTop) + 'px') : '' " ></div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            loader
                .load()
                .then((google) => {
                    const reykjavikAuto = { lat: 64.0151012, lng: -22.5758613 };

                    const locationMapElement = document.getElementById("location-map")

                    // The map, centered at Uluru
                    const map = new google.maps.Map(locationMapElement, {
                        zoom: 13,
                        center: reykjavikAuto,
                        mapId: '307e19008875bc83', /* https://console.cloud.google.com/google/maps-apis/studio/maps?authuser=3&project=website-368713 */
                        disableDefaultUI: true,
                        gestureHandling: "greedy"
                    });

                    new google.maps.Marker({
                        position: reykjavikAuto,
                        map,
                    });
                })
                .catch(e => {
                    console.log(e)
                });
        });

    </script>
@endpush
