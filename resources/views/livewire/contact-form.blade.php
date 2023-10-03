<div class="relative autofill-black autofill-border-red">
        
    <livewire:modal wire:key="modalContactForm" modalId="modalContactForm" :modal-title="__('contact.message_sent-title')" :modal-text="__('contact.message_sent-text')" />     
    
    <livewire:contact-submit :submitButtonCentered="false" modalId="modalContactForm"/>
</div>