<div
    class="absolute top-0 left-0 z-10 h-full w-full backdrop-blur-sm bg-white/30"    
    x-data="paymentProcessing({ processing: @entangle('processing') })"  
    x-ref="paymentProcessing"      
>
    <div >
        <div class="mt-10 md:mt-20 text-center text-pink-red font-semibold md:text-2xl leading-6 md:leading-8">
            {!! __('payment.processing') !!}
        </div>

        <x-spinner />
    </div>
</div>
