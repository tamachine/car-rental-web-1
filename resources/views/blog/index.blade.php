@extends('layouts.web')

@section('body')

    <div class="px-5 md:px-0 max-w-6xl mx-auto">

        @include('blog.partial.index.hero')

        @include('blog.partial.index.filters')

        
    </div>  
    
@endsection
