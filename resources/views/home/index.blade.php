@extends('layouts.web')

@section('body')

    <div class="intro relative">
        @include('home.partial.hero')
    </div>

    <div class="max-w-6xl mx-auto p-3 sm:px-8 md:p-10 xl:px-0">
        @include('home.partial.reviews')

        @include('home.partial.box1')

        @include('home.partial.cards-default')

        @include('home.partial.box2')

        @include('home.partial.cards-elongated')
    </div>
    
@endsection
