@extends('layouts.web')

@section('body')
    <div class="px-5 md:px-0 max-w-6xl mx-auto">
        <livewire:blog-search-author :blogAuthorSlug="$author->slug" />
    </div>
@endsection
