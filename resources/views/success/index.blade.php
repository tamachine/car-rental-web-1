@extends('layouts.web')

@section('body')
    <div class="bg-white w-fill-screen">
        <div class="px-5 md:px-0 max-w-6xl mx-auto">
            <x-heading-title title="{!! __('success.title') !!}" subtitle="{!! __('success.subtitle') !!}" />

            <div class="max-w-7xl py-4 md:py-12">
                <livewire:success />
            </div>
        </div>
    </div>
@endsection
