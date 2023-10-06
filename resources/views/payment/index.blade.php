@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        <div class="px-5 md:px-0 max-w-6xl mx-auto">
            @include('payment.partial.steps-desktop')

            <x-heading-title title="{!! __('payment.title') !!}" subtitle="{!! __('payment.subtitle') !!}" />

            @include('payment.partial.steps-mobile')

            <div class="max-w-7xl py-4 md:py-12">
                <livewire:payment />
            </div>
        </div>
    </div>
@endsection
