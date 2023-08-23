<div class="hidden md:inline-block w-full">

    {{-- Desktop --}}

    <div id="time-picker" class="px-[3%] lg:px-4 md:mt-3">
        <div class="container md:flex md:gap-[5%] relative md:border-t-[1px] md:border-gray-secondary">

            <x-time-picker inputElementSelector="#hour-start" :text="__('car-search-bar.start-time')" urlElementParam="startTime"/>
           
            <x-time-picker inputElementSelector="#hour-end"   :text="__('car-search-bar.end-time')" urlElementParam="endTime"/>

            <datalist id="times">
                @foreach($times as $index => $time)
                    <option value="{{ $index }}" time="{{ $time['time'] }}" type="{{ $time['meridian'] }}">
                        {{ $time['hour'] }}:{{ $time['minute'] }} <span>{{ $time['meridian'] }}</span>
                    </option>
                @endforeach
            </datalist>
        
        </div>
    </div>
    <div class="md:hidden w-full text-center">
        <button x-on:click="continueShowLocation()" id="continue-time__button" class="btn btn-red px-16 py-3">{!! __('car-search-bar.mobile-continue-button') !!}</button>
    </div>
</div>

