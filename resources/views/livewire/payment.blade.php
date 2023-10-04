<div class="relative">
    <div class="xl:flex xl:justify-between">
        <div class="w-full flex flex-col gap-3 max-w-[600px] mx-auto">
            @include('payment.partial.personal-information')

            @include('payment.partial.additional')
        </div>

        <div class="hidden xl:block">
            @include('summary.index', ['buttonText' => __('summary.reserve-now')])
        </div>
    </div>    

    @if($generateValitorForm)                                
        @include('payment.partial.payment-processing')
        {{-- 
        TODO 
        <x-valitor-form :booking="$booking" />
        --}}
    @endif    
</div>
