@extends('layouts.web')

@section('body')        
    <div class="px-7 md:px-0 max-w-7xl mx-auto">  
        @include('insurances.partial.steps-desktop')
        
        <div class="max-w-6xl mx-auto px-0 md:px-9">
            @include('insurances.partial.title')
                      
            @include('insurances.partial.steps-mobile')

            @include('insurances.partial.table')
        </div>
    </div>
@endsection