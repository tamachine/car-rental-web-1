<h3 class="hidden lg:block text-left text-pink-red">
    {!! __('payment.personal-information') !!}
</h3>

<h3 class="block lg:hidden text-center font-fredoka-semibold text-pink-red text-2xl">
    {!! __('payment.personal-information') !!}
</h3>

<div class="px-6 lg:px-0">
    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="first_name" type="text" placeholder="{{ __('payment.first-name') }}" />
        <x-payment-input field="last_name" type="text" placeholder="{{ __('payment.last-name') }}" />
    </div>

    <div class="lg:mt-5 lg:flex lg:justify-between">
        <x-payment-input field="email" type="email" placeholder="{{ __('payment.email') }}" />
        <x-payment-input field="email_confirmation" type="email" placeholder="{{ __('payment.email-confirmation') }}" />
    </div>

    <div class="lg:mt-2 lg:flex lg:justify-between">
        <x-payment-input field="telephone" type="text" placeholder="{{ __('payment.telephone') }}" />
        <x-payment-input field="country" type="text" placeholder="{{ __('payment.country') }}" />
    </div>

    <div class="lg:mt-5 lg:flex lg:justify-between">
        <x-payment-input field="address" type="text" placeholder="{{ __('payment.your-address') }}" />
        <x-payment-input field="postal_code" type="text" placeholder="{{ __('payment.postal-code') }}" />
    </div>

    <div class="lg:mt-5 lg:flex lg:justify-between">
        <x-payment-input field="city" type="text" placeholder="{{ __('payment.city') }}" />
        <div>
            <div class="mx-auto lg:mx-0 w-full md:w-[280px] mt-7 flex flex-row justify-between items-center rounded-lg border border-gray-200 px-4 font-sans-medium text-lg">
                <label class="overflow-hidden h-12 flex items-center">{{ __('payment.passengers') }}</label>            
                <x-plus-minus-input field="number_passengers"/>                      
            </div>

            @error('number_passengers')
            <p class="validation-error text-sm text-red-600 md:w-[280px]">
                {{ $message }}
            </p>
            @enderror
        </div>        
    </div>
</div>
