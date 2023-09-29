<div class="md:hidden flex justify-center py-9 ">     
    @if($showSummary)                     
        <x-steps active="3" :mobile=true :car="$car"/>           
    @else
        <x-steps active="2" :mobile=true :car="$car"/>           
    @endif
    
</div>