@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('images/cars-iceland-logo.png') }}">
        @endcomponent
    @endslot

    <h1>Contact from {{config('app.name')}}</h1>

    <ul>
        <li>Name: {{$request->get('name')}}</li>
        <li>Email: {{$request->get('email')}}</li>
        <li>Subject: {{$request->get('subject')}}</li>
        <li>Enquiry Type: {{$request->get('type')}}</li>
        <li>Message: {{$request->get('message')}}</li>
    </ul>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Copyright © {{date('Y')}} {{config('app.name')}}
        @endcomponent
    @endslot
@endcomponent
