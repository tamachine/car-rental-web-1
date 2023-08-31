<div class="{{ $containerClass }}">
    <input type="email" class="{{ $inputClass }}" maxlength="255"
            wire:model.defer="newsletter_email" autocomplete="email" placeholder="{{ __('newsletter.placeholder') }}"
    />

    <button class="{{ $buttonClass }}"
            wire:click="submitNewsletter"
    >
        {{ __('newsletter.subscribe') }}
    </button>
</div>

