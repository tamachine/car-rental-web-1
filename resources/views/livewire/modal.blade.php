@if($showModal)
    <x-modal title="{{ $modalTitle }}" text="{{ $modalText }}" />
@else
    <div class="hidden"></div> {{-- livewire requires a main tag for every component --}}
@endif