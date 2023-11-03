@extends('layouts.web')

@section('body')    
    <div class="px-5 md:px-0 max-w-6xl mx-auto relative post" x-data="blogPagination()" @scroll.window="scrolling()">                
        
        <x-breadcrumb :breadcrumbs="$breadcrumbs"/>

        @include('blog.partial.show.image')
       
        @include('blog.partial.show.title')

        @include('blog.partial.show.content')

        @include('blog.partial.show.pagination')

        @include('blog.partial.show.newsletter')

        @include('blog.partial.show.related')
    </div>
@endsection
