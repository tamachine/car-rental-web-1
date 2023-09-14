<div class="relative autofill-black autofill-border-red">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <x-wire-spinner /> 
    </div>
    @if($showModal)
        <x-modal :title="__('contact.message_sent-title')" :text="__('contact.message_sent-text')"/>    
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">        
        @foreach(['name', 'email', 'subject'] as $input)
            <div class="w-full">
                <label for="{{ $input }}" class="p-3">{!! __('contact.'. $input) !!}</label>
                <input 
                    id="{{ $input }}" 
                    type="text" 
                    class="
                        mt-2 w-full rounded-md border-gray-200 
                        h-[60px] focus:border-1 focus:border-pink-red focus:ring-0                        
                        "
                    maxlength="255" 
                    wire:model.defer="{{ $input }}" 
                    autocomplete="{{ $input }}" 
                />       

                @error($input)
                    <p class="validation-error text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
        @endforeach    

        <!-- Enquiry Type -->
        <div>        
            <label for="type" class="p-3">{!! __('contact.enquiry_type') !!}</label>
            <select id="type" name="type" wire:model.defer="type"
                class="
                    mt-2 w-full rounded-md border-gray-200 
                    h-[60px] focus:border-1 focus:border-pink-red focus:ring-0"
            >
                @foreach(config('contact.enquiry_types') as $enquiryType)
                    <option value="{{$enquiryType}}">{{ __('contact.enquiry_' . $enquiryType) }}</option>
                @endforeach
            </select>

            @error('type')
                    <p class="validation-error text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Message -->
        <div class="md:w-full md:col-span-2">        
            <label for="type" class="p-3">{!! __('contact.message') !!}</label>
            <textarea 
                id="message" 
                class="
                    mt-2 w-full rounded-md border-gray-200
                    focus:border-1 focus:border-pink-red focus:ring-0"
                wire:model.defer="message" rows="5">
            </textarea>
            @error('message')
                    <p class="validation-error text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex {{ $submitButtonCentered ? 'justify-center' : 'justify-start' }}  md:col-span-2 ">
            <button class="w-full md:w-48 rounded-lg text-white font-sans-bold py-3 text-lg bg-pink-red hover:bg-black-ci disabled:bg-[#B1B5C3]"
                wire:click="send"
            >
                {{ __('contact.submit') }}
            </button>
        </div>
    </div>  
</div>