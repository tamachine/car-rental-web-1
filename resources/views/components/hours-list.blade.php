@for($i = 0; $i <= 47; $i++)
    @php
        $hour = floor($i / 2);
        $minute = ($i % 2 == 0) ? "00" : "30";
        $meridian = ($hour >= 12) ? "PM" : "AM";
        if ($hour == 0) {
            $hour = 12;
        } else if ($hour > 12) {
            $hour -= 12;
        }
        $time = $hour . ":" . $minute;
    @endphp
    <option value="{{ $hour }}:{{ $minute }} {{ $meridian }}" time="{{ $time }}" type="{{ $meridian }}">
        {{ $hour }}:{{ $minute }} <span>{{ $meridian }}</span>
    </option>
@endfor