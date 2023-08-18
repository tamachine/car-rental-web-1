@if($schemas)
    @foreach($schemas as $schema)
        <script type="application/ld+json">{!! json_encode($schema->schema, JSON_UNESCAPED_SLASHES) !!}</script>
    @endforeach
@endif