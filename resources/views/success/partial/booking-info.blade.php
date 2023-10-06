<div class="w-11/12 xl:w-1/2 max-w-[600px] mx-auto rounded-xl bg-white border border-gray-secondary">
    <img class="mx-auto rounded-t-xl w-full overflow-hidden" src="{{ $mainImage }}">

    <div class="p-8">
        <div>
            <div class="font-sans-bold text-2xl">
                {{$car->name}}
            </div>

            <div class="mt-6 flex">
                <div class="w-1/2">
                    <div class="font-sans-medium text-base text-[#A5A5A5]">
                        {!! __('summary.pickup') !!}
                    </div>
                    <div class="font-sans-bold text-lg text-black-ci">
                        {{$bookingPickupDate}}
                    </div>
                </div>

                <div class="w-1/2">
                    <div class="font-sans-medium text-base text-[#A5A5A5]">
                        {!! __('summary.return') !!}
                    </div>
                    <div class="font-sans-bold text-lg text-black-ci">
                        {{$bookingDropoffDate}}
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            @if ($pickupLocation == $dropoffLocation)
                <div class="font-sans-medium text-base text-[#A5A5A5]">
                    {!! __('summary.pickup-return-location') !!}
                </div>
                <div class="font-sans-bold text-lg text-black-ci">
                    {{$pickupLocation}}
                </div>
            @else
                <div class="font-sans-medium text-base text-[#A5A5A5]">
                    {!! __('summary.pickup-location') !!}
                </div>
                <div class="font-sans-bold text-lg text-black-ci">
                    {{$pickupLocation}}
                </div>
                <div class="font-sans-medium text-base text-[#A5A5A5]">
                    {!! __('summary.return-location') !!}
                </div>
                <div class="font-sans-bold text-lg text-black-ci">
                    {{$dropoffLocation}}
                </div>
            @endif
        </div>

        <hr class="border-gray-secondary my-4">

        @if (count($insurances))
            <div class="font-sans-bold text-[26px] text-black-ci">
                {!! __('summary.insurances') !!}
            </div>

            @foreach($insurances as $insurance)
                <div class="mt-2 flex justify-between">
                    <div class="font-sans-bold text-lg text-black-ci">
                        {{$insurance['name']}}
                    </div>

                    <div class="font-sans-medium text-xl {{$insurance['price'] > 0 ? 'text-black-ci' : 'text-pink-red'}}">
                        @if ($insurance['price'] > 0)
                            {{formatPrice($insurance['price'])}}
                        @else
                            {!! __('summary.free') !!}
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        <hr class="border-gray-secondary my-4">

        <div class="font-sans-bold text-[26px] text-black-ci">
            {!! __('summary.extras') !!}
        </div>

        @foreach($includedExtras as $includedExtra)
            <div class="mt-2 flex justify-between">
                <div class="font-sans-bold text-lg text-black-ci">
                    {{$includedExtra['name']}}
                </div>

                <div class="font-sans-medium text-lg text-pink-red">
                    {!! __('summary.free') !!}
                </div>
            </div>
        @endforeach

        @foreach($chosenExtras as $chosenExtra)
            <div class="mt-2 flex justify-between">
                <div class="font-sans-bold text-lg text-black-ci">
                    {{$chosenExtra['name']}}
                </div>

                <div class="font-sans-medium text-lg {{$chosenExtra['price'] > 0 ? 'text-black-ci' : 'text-pink-red'}}">
                    @if ($chosenExtra['price'] > 0)
                        {{formatPrice($chosenExtra['price'])}}
                    @else
                        {!! __('summary.free') !!}
                    @endif
                </div>
            </div>
        @endforeach

        <hr class="border-gray-secondary my-4">

        <div class="mt-2 flex justify-between">
            <div class="font-sans-bold text-[28px] text-black-ci">
                {!! __('summary.total') !!}
            </div>

            <div class="font-sans-bold text-[28px] text-black-ci">
                {{formatPrice($totalPrice)}}
            </div>
        </div>

        @if (selectedCurrency() != 'ISK')
            <div class="flex justify-between">
                <div class="font-sans-medium text-black-ci">
                    {!! __('summary.total-in-isk') !!}
                </div>

                <div class="font-sans-bold text-black-ci">
                    {{formatPrice($iskPrice, 'ISK')}}
                </div>
            </div>
        @endif

        <div class="mt-2 flex justify-between bg-[#d9d9d94d] rounded-md p-4 items-center">
            <div class="font-sans-medium text-lg text-pink-red">
                {!! __('summary.paid-now') !!} ({{$percentage}} %)
            </div>

            <div class="font-sans-bold text-[26px] text-pink-red">
                {{formatPrice($payNow)}}
            </div>
        </div>
    </div>
</div>
