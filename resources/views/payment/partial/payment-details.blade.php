<div class="mt-16" wire:ignore>
    <h3 class="hidden lg:block text-left text-pink-red">
        {!! __('payment.payment-details') !!}
    </h3>

    <h3 class="block lg:hidden text-center font-fredoka-semibold text-pink-red text-2xl">
        {!! __('payment.payment-details') !!}
    </h3>

    <div class="mt-8 px-6 lg:px-0 lg:flex lg:justify-between lg:items-center">
        <div class="mx-auto w-full md:w-[280px]">
            <img src="{{ asset('images/sample-card.png') }}" class="w-full md:w-[280px]" />
        </div>

        <div class="mx-auto w-full mt-4 md:w-[280px] lg:mt-0">
            <div>
                <x-input id="card_number" type="text" class="w-full md:w-[280px] h-12" placeholder="{{ __('payment.card-number') }}" />
            </div>

            <div class="mt-6">
                <x-input id="card_name" type="text" class="w-full md:w-[280px] h-12" placeholder="{{ __('payment.card-name') }}" />
            </div>

            <div class="mt-6 flex justify-between">
                <x-input id="card_month" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-month') }}" />
                <x-input id="card_year" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-year') }}" />
                <x-input id="card_csv" type="text" class="w-[85px] h-12" placeholder="{{ __('payment.card-csv') }}" />
            </div>
        </div>
    </div>
</div>
