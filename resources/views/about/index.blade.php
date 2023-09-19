@extends('layouts.web')

@section('body')

    @include('about.partial.hero')

    <div class="px-5 md:px-0 max-w-6xl mx-auto">

        @include('about.partial.intro')

        @include('about.partial.section1')

        @include('about.partial.testimonials')

        @include('about.partial.likes') 

    </div>

@endsection