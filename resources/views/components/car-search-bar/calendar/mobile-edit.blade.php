{{-- Mobile: edit pickup and return time and location --}}
<div 
    x-show="showResume"
    class="h-full"
    x-data="mobileInputs({ locations: '{{ $locationsIds }}' })"
    >
    <div id="resume" class="flex flex-col justify-between h-full">
        <div class="overflow-auto p-5 sm:px-10">
            <h3 class="font-fredoka-medium text-[28px] text-center mb-7">{!! __('car-search-bar.mobile-resume-title') !!}</h3>
            <div id="resume-dates" class="mb-10">
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{ asset('images/icons/calendar.svg') }}" />
                    <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-dates-title') !!}</h3>
                </div>
                <div>
                    <div x-on:click="backShowDate()" 
                        id="resume-mobile-dates"
                        class="mobile-dates search-input-group flex bg-white">
                        @foreach ($ranges as $range)
                            <div class='search-input-set'>
                                <div class="search-info">
                                    <div class="search-input-label">
                                        <label for="{{ $range }}-date">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                    </div>
                                    <div class="hidden selected text-black">
                                        <div
                                            class="flex flex-row items-stretch justify-center font-sans-medium gap-1">
                                            <span id=""
                                                class="{{ $range }}-day text-[36px] leading-[0.8em]"></span>
                                            <div class="flex flex-col justify-between items-center">
                                                <span id=""
                                                    class="{{ $range }}-dayweek text-sm leading-none uppercase"></span>
                                                <span id=""
                                                    class="{{ $range }}-month text-sm leading-none uppercase"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="{{ $range }}-date search-input"
                                    placeholder="{!! __('car-search-bar.' . $range . '-day-placeholder') !!}" readonly="readonly" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="resume-times" class="mb-10">
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{ asset('images/icons/time.svg') }}" />
                    <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-times-title') !!}</h3>
                </div>
                <div>
                    <div id="resume-mobile-times"
                        class="mobile-times search-input-group flex bg-white">
                        @foreach ($ranges as $range)
                            <div id="search-input-{{ $range }}-hour"
                                class="search-input-set active">
                                <div class="search-info pointer-events-none">
                                    <div class="search-input-label">
                                        <label
                                            for="hour-{{ $range }}">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                    </div>
                                    <div class="resume-selected search-input">
                                        <span id="resume-time--{{ $range }}"
                                            class="font-sans-medium text-xl" x-text="{{ $range }}Hour"></span>
                                        <span id="resume-type--{{ $range }}"
                                            class="text-xs" x-text="{{ $range }}Meridian"></span>
                                    </div>
                                    <img class="select-arrow w-[8px] " src="{{ asset('images/icons/arrow-down-solid.svg') }}" />
                                </div>
                                <select 
                                    x-on:change="mobileSelectableChange('hour-{{ $range }}', event)"
                                    id="{{ $range }}-hours-list"
                                    name="{{ $range }}-hours-list"
                                    for="'selected-time-{{ $range }}'"
                                    x-model="{{ $range }}Time"
                                    >

                                    <x-hours-list />
                                    
                                </select>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="resume-locations" class="mb-10">
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{ asset('images/icons/location.svg') }}" />
                    <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-location-title') !!}</h3>
                </div>
                <div>
                    <div id="resume-mobile-locations"
                        class="mobile-locations search-input-group flex bg-white">
                        @foreach ($ranges as $range)
                            <div id="search-input-{{ $range }}-hour"
                                class="search-input-set active">
                                <div class="search-info pointer-events-none">
                                    <div class="search-input-label">
                                        <label
                                        for="hour-{{ $range }}">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                    </div>
                                    <div class="resume-selected search-input">
                                        <span id="resume-location--{{ $range }}"
                                        class="w-full font-sans-medium text-xl text-ellipsis overflow-hidden" x-text="{{ $range }}Location">KEF Int</span>
                                    </div>
                                    <img class="select-arrow w-[8px] " src="{{ asset('images/icons/arrow-down-solid.svg') }}" />
                                </div>
                                <select 
                                    x-on:change="mobileSelectableChange('{{ $range == 'start' ? 'pickup' : 'return' }}-location', event)"
                                    id="{{ $range }}-locations-list"
                                    name="{{ $range }}-locations-list"
                                    for="'selected-location-{{ $range }}'"
                                    x-model="{{ $range }}Location"
                                    >
                                    @foreach ($locations as $key => $location)
                                        <option value="{{ $location->name }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[80%] text-center mx-auto">
            <button class="z-20 w-full btn btn-red px-16 py-3">{!! __('car-search-bar.mobile-continue-button') !!}</button>
        </div>
    </div>

</div>