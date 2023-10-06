@extends('layouts.web')

@section('body')
    <div class="bg-[#FCFCFC] w-fill-screen bg-gradient-to-b from-transparent to-white">
        <div class="px-3 sm:px-8 md:px-0 max-w-7xl mx-auto">
            @include('extras.partial.steps-desktop')

            <x-heading-title title="{!! __('extras.title') !!}" subtitle="{!! __('extras.subtitle') !!}" />

            @include('extras.partial.steps-mobile')

            <div class="max-w-7xl py-4 md:py-12">                
                <livewire:extras :car="$car" />                
            </div>
        </div>
    </div>
@endsection
