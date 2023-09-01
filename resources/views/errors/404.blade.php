@extends('layouts.errors')

@section('body')
    <div class="h-[calc(100vh_-_62px)] md:h-[calc(100vh_-_76px)] w-fill-screen text-white">
        <div class="bg-image image-wrapper">                    
            <x-webp-image :image-path="asset('images/404.jpg')" :webp-image-path="asset('images/404.webp')" />
        </div>
        <div class="relative flex md:flex-row flex-col justify-between md:justify-center mx-auto w-full md:h-auto h-full gap-1 md:gap-6 items-center md:text-left text-center md:p-0 pb-10">
            <div class="text-[128px] md:text-[220px] font-fredoka-semibold flex flex-col">
                <div>404</div>
                <div class="max-w-[240px] md:max-w-md flex md:hidden text-lg title-shadow font-fredoka-medium">
                    {!! __('app-errors.not-found-title') !!}
                </div>
            </div>

            <div class="max-w-[240px] md:max-w-md">
                <div class="hidden md:flex text-lg title-shadow font-fredoka-medium">
                    {!! __('app-errors.not-found-title') !!}
                </div>

                <div class="mt-6 font-sans-bold">
                    <button class="btn btn-red font-sans-bold py-3 px-10" onclick='window.location.href="{{route("home")}}"'>{!! __('app-errors.not-found-button') !!}</button>
                </div>
            </div>
        </div>        
    </div>
@endsection

