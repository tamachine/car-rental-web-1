<div class="w-full md:w-[280px] mt-4 md:mt-0 mx-auto lg:mx-0" x-data="{ openLabel: false, {{$field}}: '' }">
    <label class="pl-4 font-sans-medium text-base text-gray-light"
        :class="{ 'visible': openLabel || {{$field}} != '', 'invisible': !openLabel && {{$field}} == '' }"
    >
        {{ $placeholder }}
    </label>

    <input class="w-full md:w-[280px] h-12 mt-1 px-4 rounded-lg border-black bg-white text-black placeholder-gray-400 placeholder-shown:border-gray-200 placeholder-shown:bg-gray-100 placeholder-shown:text-gray-400 focus:bg-white focus:border-black focus:ring-0"
        type="{{$type}}"
        autocomplete="{{$field}}"
        wire:model="{{$field}}"
        x-model="{{$field}}"
        x-bind:placeholder="openLabel ? '' : '{{$placeholder}}'"
        x-on:focus="openLabel = true"
        x-on:click.away="openLabel = false"
    >

    @error($field)
        <p class="validation-error text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>
