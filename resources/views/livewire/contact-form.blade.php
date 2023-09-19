<div class="relative autofill-black autofill-border-red">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <x-wire-spinner /> 
    </div>
    
    <livewire:modal wire:key="modalContactForm" modalId="modalContactForm" :modal-title="__('contact.message_sent-title')" :modal-text="__('contact.message_sent-text')" />     
    
    <livewire:contact-submit :submitButtonCentered="false" modalId="modalContactForm"/>
</div>