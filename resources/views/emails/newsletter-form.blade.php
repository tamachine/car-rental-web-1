@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('images/cars-iceland-logo.png') }}">
        @endcomponent
    @endslot

    <h1>{{config('app.name')}}: New subscription to the newsletter</h1>

    <ul>
        <li>Email: {{$request->get('email')}}</li>
    </ul>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Copyright © {{date('Y')}} {{config('app.name')}}
        @endcomponent
    @endslot
@endcomponent
