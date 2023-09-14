@extends('layouts.web')

@section('body')
    <div class="bg-gray-50 md:bg-white w-fill-screen">
        <div class="max-w-7xl mx-auto px-5 md:px-11">
            
            @include('contact.partial.title')

            @include('contact.partial.form')

           @include('contact.partial.newsletter')
            
        </div>
    </div>
@endsection
