<div 
    id="mobile-dates"
    class="mobile-dates hidden flex search-input-group gap-2 basis-[32%] lg:basis-[30%] border-black bg-white"
    >
    
    @foreach ($ranges as $range)
        <x-selected-date size="mobile" range="{{ $range }}" />
    @endforeach
</div>