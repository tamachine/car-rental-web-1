@extends('layouts.web')

@section('body')

    <div class="intro relative">
        @include('home.partial.hero')
    </div>

    <div class="max-w-6xl mx-auto p-3 sm:px-8 md:p-10 xl:px-0">
        @include('web.home.partial.reviews')
    </div>
    
@endsection
