<section class="mt-16 md:mt-36">
    
    <div class="text-center pb-6 md:pb-16">
        <h2 class="text-[40px] md:text-5xl">
            {!! __('landing-insurances.features-title') !!}
        </h2>
        <h4 class="font-base text-lg">
        {!! __('landing-insurances.features-subtitle') !!}
        </h4>
    </div>
    
    <div class="flex gap-14">
        <div class="w-full">
        @foreach($featuresFirstColumn as $feature)
            <x-accordion :question="$feature->name" :answer="$feature->description" class="border-b py-4" group-id="insurances-features" question-font-size-class="text-base md:text-xl"/>
        @endforeach
        </div>
        <div class="hidden w-full md:inline-block">
        @foreach($featuresSecondColumn as $feature)
            <x-accordion :question="$feature->name" :answer="$feature->description" class="border-b py-4" group-id="insurances-features"/>
        @endforeach
        </div>
    </div>

    @if($showButton)
        <button wire:loading.remove wire:click="loadMore()" class="text-lg mx-auto mt-6 w-full">{!! __('landing-insurances.features-load-more-button') !!}</button>
        <x-wire-spinner />
    @endif
</section>
