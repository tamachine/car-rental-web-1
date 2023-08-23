<div
    {!! $attributes->merge(['class' => 'search-input-set']) !!}
>
    <div class="search-input-label">
        <label for="{{ $range }}-date">{!! __('car-search-bar.' . $range . '-day') !!}</label>
    </div>
    <div class="hidden selected">
        <div class="flex flex-row items-stretch justify-center font-sans-medium gap-1">
            <span id="" class="{{ $range }}-day text-[30px] leading-[0.8em]"></span>
            <div class="flex flex-col justify-between items-center">
                <span id="" class="{{ $range }}-dayweek text-[12px] leading-none capitalize"></span>
                <span id="" class="{{ $range }}-month text-[12px] leading-none"></span>
            </div>
        </div>
    </div>
    <input type="text" name="dates[{{ $range }}]" class="{{ $range }}-date search-input" placeholder="{!! __('car-search-bar.' . $range . '-day-placeholder') !!}" readonly="readonly"/>
</div>
