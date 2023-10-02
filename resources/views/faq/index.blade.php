@extends('layouts.web')

@section('body')
    <div class="max-w-7xl mx-auto px-5 md:px-11">    
        @include('faq.partial.breadcrumbs')
        
        @include('faq.partial.faqs')

        @include('faq.partial.form')
    </div>
@endsection
