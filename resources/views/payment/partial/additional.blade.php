<div class="mt-16 w-[280px] mx-auto lg:w-full lg:mx-0">
    <h3 class="hidden lg:block text-left text-pink-red">
        {!! __('payment.additional-information') !!}
    </h3>

    <h3 class="block lg:hidden text-center font-fredoka-semibold text-pink-red text-2xl">
        {!! __('payment.additional-information') !!}
    </h3>

    <div class="mt-4 mx-auto">
        <textarea class="w-full h-32 rounded-lg border-black bg-white text-black placeholder-gray-400 placeholder-shown:border-gray-200 placeholder-shown:bg-gray-100 placeholder-shown:text-gray-400"
            placeholder="{!! __('payment.add-your-message') !!}"
            wire:model="additional"
        >
        </textarea>
    </div>

    <div class="mt-2">
        <input type="checkbox" class="w-[30px] h-[30px] border-gray-200 rounded-lg bg-gray-100"
            id="agree" wire:model.lazy="agree"
        />
        <label for="agree" class="ml-2 font-sans-bold text-base">
            {!! __('payment.i-agree') !!}
            <a class="text-pink-red" href="#">
                {!! __('payment.t-and-c') !!}
            </a>
        </label>
    </div>

    <div class="mt-8 xl:hidden">
        <button class="w-full rounded-lg text-white font-sans-bold py-4 text-lg bg-pink-red hover:bg-black-ci disabled:bg-[#B1B5C3]"
            wire:click="continue"            
        >
            {!! __('summary.reserve-now') !!}
        </button>
    </div>
</div>
