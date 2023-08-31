<div>
    <div class="{{ $containerClass }}">
        <x-input type="email" class="{{ $inputClass }}" maxlength="255"
                wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('newsletter.placeholder') }}"
        />

        <button class="{{ $buttonClass }}"
                wire:click="submitNewsletter"
        >
            {{ __('newsletter.subscribe') }}
        </button>
    </div>

    @if($mobileButtonClass)
        <button class="{{ $mobileButtonClass }}"
                wire:click="submitNewsletter"
        >
            {{ __('newsletter.subscribe') }}
        </button>
    @endif
</div>