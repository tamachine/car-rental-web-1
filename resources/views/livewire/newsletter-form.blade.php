<div class="relative autofill-black autofill-border-none">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
        <x-wire-spinner /> 
    </div>

    <livewire:modal :modal-title="__('newsletter.email_sent-title')" :modal-text="__('newsletter.email_sent-text')" />
    
    <div class="bg-pink-red-secondary md:rounded-[30px] w-fill-screen md:w-full md:left-0 py-14 px-4 text-center">
        <h2 class="max-w-2xl mx-auto text-[32px] md:text-5xl leading-10 md:leading-[60px] px-7">
            {{ __('newsletter.title') }}
        </h2>

        <div class="max-w-xl font-sans text-base text-black/60 px-7 mt-4 md:mt-5 mx-auto">
            {{ __('newsletter.text') }}
        </div>

        <!-- Subscribe -->
        <livewire:newsletter-submit 
            containerClass="md:max-w-[480px] mx-auto h-20 mt-8 bg-white rounded-xl md:rounded-[24px] flex justify-between content-center"
            inputClass="w-full h-full border-none focus:ring-0 focus:bg-white mx-4"
            buttonClass="hidden md:block md-max:mx-auto                    
                    md:mt-4 mt-12 md:px-6 md:mx-5
                    w-36 h-12 
                    rounded-lg 
                    text-white font-sans-bold text-xl 
                    bg-pink-red hover:bg-black disabled:bg-[#B1B5C3]"
            mobileButtonClass="md:hidden block mx-auto 
                mt-12             
                w-36 h-12
                rounded-lg 
                text-white font-sans-bold text-xl
                bg-pink-red hover:bg-black disabled:bg-[#B1B5C3]"
        />              
    </div>
    
</div>
