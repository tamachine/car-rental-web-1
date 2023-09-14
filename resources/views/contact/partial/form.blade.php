<div class="flex flex-col md:flex-row mt-8 md:mt-28 gap-8 md:gap-11">
    <div class="mx-auto w-60 md:w-80">   
        <x-webp-image :image-path="asset('images/contact/contact-top.jpg')" :webp-image-path="asset('images/contact/contact-top.webp')" class="object-cover h-full rounded-xl" />
    </div>
    <div class="flex-grow">
        <livewire:contact-form  :submitButtonCentered="false" />
    </div>
</div>