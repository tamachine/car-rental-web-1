<h2 class="font-fredoka-semibold text-4xl md:text-[32px] mt-24 md:mt-28 mb-7 md:mb-9 text-center px-5">
    {!! __('about.likes-title') !!}
 </h2>
 
 <div class="grid grid-cols-1 md:grid-cols-3 md:flex-row items-center gap-16 md:gap-20">
     @for ($i = 1; $i <= 3 ; $i++)
         @include('about.partial.likes-card', ['imagePath' => '/images/about/about-like-'.$i.'.png', 'textPath' => 'about.likes-text-'.$i])
     @endfor    
 </div>