<div>
    {{-- desktop --}}
    <table class="hidden md:table table-auto h-fit w-full mt-20 mb-7">
        <thead>
            <tr>
                <th class="pr-6 font-normal">
                    @include('insurances.partial.free-cancelation')
                </th>

                @foreach($insurances as $insurance)
                <th class="pb-10 {{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }} font-normal">                            
                    <x-insurance-box :insurance=$insurance :price="$isLanding ? $insurance->price_from : $insurance->price" :show-button="!$isLanding" class="w-52"/>                                        
                </th>
                @endforeach
            </tr>
        </thead>
    <tbody>
    @foreach($features as $feature)
        <tr class="{{ ($loop->even) ? '' : 'bg-pink-red-secondary' }}">
            <td class="rounded-l-lg p-6 font-sans-medium md:text-lg flex gap-[6px] relative" x-data="{tooltip: false}" >
                <img class="hidden md:inline-block w-[18px] cursor-pointer" src="{{ asset('images/icons/info-black.svg') }}" x-on:mouseover="tooltip = true"  /> <span class="w-full">{!! $feature->name !!}</span>

                <img x-cloak x-show="tooltip" src="{{ asset('images/icons/triangle-left-white.svg') }}" class="w-3 h-3 z-20 absolute left-10 top-0 bottom-0 my-auto mx-auto" />                
                <div x-cloak x-show="tooltip" class="absolute left-12 w-80 bg-white rounded p-2 shadow-lg z-10 text-sm" x-on:mouseover.away="tooltip = false">{!! $feature->description !!}</div>
            </td>
            @foreach($insurances as $insurance)
            <td class="{{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }} {{ $loop->last ? 'rounded-r-lg' : '' }}">
                @if($insurance->containsFeature($feature))
                    <img class="mx-auto w-[24px]" src="{{ asset('images/icons/check-white.svg') }}" />
                @endif
            </td>
            @endforeach
        </tr>
    @endforeach
        @if(!$isLanding)
        <tr>
            <td></td>
            @foreach($insurances as $insurance)
            <td class="{{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }}">
                <div class="flex justify-center mt-4">
                    <livewire:choose-insurance buttonClass="rounded-xl px-5 py-3 bg-[{{ $insurance->color }}] text-white hover:opacity-75" :insurance="$insurance->toJson()" />
                </div>
            </td>
            @endforeach
        </tr>
        @endif
    </tbody>
    </table>
    {{-- desktop end --}}

    {{-- mobile --}}
    <div class="md:hidden flex flex-col pt-7 items-center gap-6">
        <div>
            @include('insurances.partial.free-cancelation')
        </div>

        @foreach($insurances as $insurance)
            <x-insurance-box :insurance=$insurance :price="$isLanding ? $insurance->price_from : $insurance->price" :show-button="!$isLanding"/>
        @endforeach
    </div>
    {{-- mobile end --}}
</div>