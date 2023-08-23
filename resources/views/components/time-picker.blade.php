<div 
    class="md:w-1/2 text-center pt-16 md:pt-5"
    x-data="timePicker({ inputElementSelector: '{{ $inputElementSelector }}', urlElementParam: '{{ $urlElementParam }}' })"      
    >    
    
    <div class="inline-block mb-4 text-black ">
        <span class="text-sm lg:text-base">           
            {!! $text !!}
        </span>
        <img class="inline-block ml-3 mb-1 mr-1" src="{{ asset('images/icons/arrow-right-solid.svg') }}" alt="">
        <span 
            x-text="time"
            class="text-black text-lg lg:text-xl inline-block w-[50px] lg:w-[55px] text-right"
            >
            
        </span>
        <span 
            x-text="meridian"
            class="text-base inline-block w-[25px] ml-1"
            >
            
        </span>
    </div>
    <div class="relative w-[85%] lg:w-[80%] mx-auto">
        <div             
            class="absolute top-[-2px] left-[50%] translate-x-[-47%] block text-white text-base leading-[1.6em] text-center w-[80px] pointer-events-none z-10"
            x-ref="bulletValueElement"
        >
            <span 
                x-text="time" 
                >
            </span>
            <small 
                x-text="meridian" 
               >
            </small>
        </div>        
        <input            
            x-ref="rangeinput"
            x-on:input="changeValue($event.target.value)"
            class="range-input" 
            type="range" 
            value="24" 
            min="0" 
            max="47" 
            list="times"
            x-model="currentValue"
        />
        
        <div class="bg-gray-primary rounded-3xl absolute top-px w-full flex justify-between text-[13px] text-gray-light px-2.5 pointer-events-none z-0">
            <span class="">12 <small>AM</small></span>
            <span class="">6 <small>AM</small></span>
            <span class="">12 <small>PM</small></span>
            <span class="">6 <small>PM</small></span>
            <span class="">11 <small>PM</small></span>
        </div>
    </div>
</div>
