@props([
    'name', 'id', 'units'
    ])

<div id="extra-units-{{ $id }}" class="font-fredoka-semibold text-[40px] md:h-12">{{ $units }}</div>

<div class="text-sm">{!! $name !!}</div>