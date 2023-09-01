@extends('layouts.web')

@section('body')    
    <div class="px-5 md:px-0 max-w-6xl mx-auto relative" x-data="blogPagination()" @scroll.window="scrolling()">                
        
        <x-breadcrumb :breadcrumbs="$breadcrumbs"/>

        @include('blog.partial.show.image')
       
        
    </div>
@endsection
