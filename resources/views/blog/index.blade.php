@extends('layouts.web')

@section('body')

    <div class="px-5 md:px-0 max-w-6xl mx-auto">

        @include('blog.partial.index.hero')

        @include('blog.partial.index.filters')

        @include('blog.partial.index.latest')

        @include('blog.partial.index.top10')

        @include('blog.partial.index.image')

        @include('blog.partial.index.postsByCategory')

        @include('blog.partial.index.newsletter')
    </div>  
    
@endsection
