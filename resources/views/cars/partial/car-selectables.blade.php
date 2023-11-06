<div class="flex gap-3 md:gap-10 justify-center pt-8 md:pt-10 pb-12 md:pb-24 flex-wrap">
    <x-selectable-full :selectable-full-component="$transmissionsSelectableFull" item-wire-click-event="clickSelectable" class="bg-white 'w-[160px] md:w-[185px] font-sans-medium text-black-secondary cursor-pointer text-sm md:text-base" />
    <x-selectable-full :selectable-full-component="$roadsSelectableFull" item-wire-click-event="clickSelectable"  class="bg-white 'w-[160px] md:w-[185px] font-sans-medium text-black-secondary cursor-pointer text-sm md:text-base" />
    <x-selectable-full :selectable-full-component="$seatsSelectableFull" item-wire-click-event="clickSelectable"  class="bg-white 'w-[160px] md:w-[185px] font-sans-medium text-black-secondary cursor-pointer text-sm md:text-base" />
    <x-selectable-full :selectable-full-component="$enginesSelectableFull" item-wire-click-event="clickSelectable"  class="bg-white 'w-[160px] md:w-[185px] font-sans-medium text-black-secondary cursor-pointer text-sm md:text-base" />
</div>
