@extends('layouts.web')

@section('body')        
    <div class="bg-gray-bg-cars w-fill-screen">
        <div class="max-w-7xl mx-auto px-5 md:px-11">
            
            <x-breadcrumb :breadcrumbs="$breadcrumbs" />

            @include('cars.partial.title')

            @include('cars.partial.car-search-bar')  

            @isset($dataErrors)                        
                @include('cars.partial.car-list-errors')   
            @endisset  
                        
            @include('cars.partial.car-list')  
           
        </div>
    </div>
@endsection