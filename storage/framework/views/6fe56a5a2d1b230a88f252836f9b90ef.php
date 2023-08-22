<nav 
    x-data="navBar()"         
    @languageSelector-show="show()" 
    x-cloak 
    x-show="navbarVisibility()"
    class="max-w-7xl mx-auto flex items-center justify-between flex-wrap p-3 md:px-4 md:py-5 border md:border-0 border-[#E7ECF3] bg-white sticky top-0" 
    :class="scrollingUp() ? 'z-50 shadow-lg' : 'z-30'"
    x-transition.opacity.duration.500ms    
    x-on:click.away="clickAway()"
    x-ref='navbar'
    >
    <a href="<?php echo e(route("home")); ?>" class="font-fredokaOne text-pink-red font-normal text-[26px] md:text-2xl lg:text-3xl leading-9">
        <?php echo e(__('general.brand')); ?>

    </a>

    
    <div
        class="cursor-pointer md:hidden font-sans-medium menu-selector"
        x-on:click="window.scrollTo(0, 0); showMobileNavBar = !showMobileNavBar;"
        >
        <div x-show="!showMobileNavBar">
            <span><?php echo __('navbar.open'); ?></span>
            <img src="<?php echo e(asset('images/icons/menu.svg')); ?>" class="inline" />
        </div>

        <div x-cloak x-show="showMobileNavBar">
            <span><?php echo __('navbar.close'); ?></span>
            <img src="<?php echo e(asset('images/icons/menu-close.svg')); ?>" class="inline" />
        </div>
    </div>
    

    
    <div class="hidden md:flex items-center divide-x gap-10">
        <div class="flex items-end justify-between flex-wrap gap-6 lg:gap-10 text-base lg:text-lg font-sans-medium">
            <a href="<?php echo e(route('cars')); ?>" class="hover:text-pink-red"><?php echo __('navbar.cars'); ?></a>
            <a href="<?php echo e(route('about')); ?>" class="hover:text-pink-red"><?php echo __('navbar.about'); ?></a>
            <a href="<?php echo e(route('faq')); ?>" class="hover:text-pink-red"><?php echo __('navbar.faq'); ?></a>
            <a href="<?php echo e(route('blog')); ?>" class="hover:text-pink-red"><?php echo __('navbar.blog'); ?></a>
            <a href="<?php echo e(route('contact')); ?>" class="hover:text-pink-red"><?php echo __('navbar.contact'); ?></a>
        </div>
        <div class="pl-7 text-sm font-medium flex items-center gap-1" x-on:click="toggle()">
            <img class="inline" src='<?php echo e(asset("/images/currencies/".strtolower(selectedCurrency()).".svg")); ?>' />
            <img class="inline" src='<?php echo e(asset("/images/flags/".App::currentLocale().".svg")); ?>' />
            <img class="cursor-pointer language-selector" src="<?php echo e(asset('images/icons/arrow-down.svg')); ?>" />
        </div>
    </div>
    

    <div
        class="md-max:hidden md:absolute top-[76px] right-16 z-50"
        x-cloak
        x-show="visibility()"
        >
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('language-selector', [])->html();
} elseif ($_instance->childHasBeenRendered('FgDRtI6')) {
    $componentId = $_instance->getRenderedChildComponentId('FgDRtI6');
    $componentTag = $_instance->getRenderedChildComponentTagName('FgDRtI6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FgDRtI6');
} else {
    $response = \Livewire\Livewire::mount('language-selector', []);
    $html = $response->html();
    $_instance->logRenderedChild('FgDRtI6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</nav>



<div
    x-cloak
    class="
        md:hidden fixed w-screen top-[60px] left-0 h-[calc(100dvh_-_20px)] 
        bg-white z-40 overflow-hidden"
    x-show="showMobileNavBar"
    x-transition:enter="transition ease-out duration-700"
    x-transition:enter-start="transform -translate-y-full opacity-[90%]"
    x-transition:enter-end="transform translate-y-0 opacity-full"

    x-transition:leave="transition ease-out duration-700"
    x-transition:leave-start="transform translate-y-0 opacity-full"
    x-transition:leave-end="transform -translate-y-full opacity-[90%]"
    x-data="navBar()"
    >
    <div class="flex flex-col h-full justify-between">
        <div class="h-full overflow-auto">
            <div class="flex flex-col divide-y h-full">
                <div class="h-full p-9 pb-0 flex flex-col items-center justify-around">
                    <div class="grid grid-cols-2 justify-center items-center text-center gap-y-8 gap-x-9">
                        <?php if(isset($carCategories)): ?>                        
                            <?php $__currentLoopData = $carCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <img src="<?php echo e($carType->imagePath); ?>" class="mx-auto" />
                                <span><?php echo e($carType->getTextTranslated()); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div>
                            <a href="<?php echo e(route('cars')); ?>" class="btn font-fredoka font-medium text-sm text-black-primary p-4 border border-gray-secondary  focus:bg-gray-secondary cursor-pointer"><?php echo __('navbar.cars-button'); ?></a>
                        </div>
                    </div>

                    <div class="text-center text-pink-red font-fredoka-semibold text-[26px] py-5 h-full flex items-center justify-center">
                        <?php echo __('navbar.cars-title'); ?>

                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between flex-wrap text-xl font-fredoka font-medium">
                        <a href="<?php echo e(route('about')); ?>"><?php echo e(__('navbar.about')); ?></a>
                        <a href="<?php echo e(route('faq')); ?>"><?php echo e(__('navbar.faq')); ?></a>
                        <a href="<?php echo e(route('blog')); ?>"><?php echo e(__('navbar.blog')); ?></a>
                        <a href="<?php echo e(route('contact')); ?>"><?php echo e(__('navbar.contact')); ?></a>
                    </div>
                </div>
                <div class="font-fredoka-semibold text-center pt-5 pb-10">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]"><?php echo __('general.languages-language'); ?></div>
                            <div class="flex justify-center gap-2">
                                <img src="<?php echo e(asset('images/flags/'.App::getLocale().'.svg')); ?>" />
                                <span class="text-black-primary font-sans font-medium"><?php echo __('general.languages-'.App::getLocale()); ?></span>
                                <img class="cursor-pointer language-selector-mobile" src="<?php echo e(asset('images/icons/arrow-down.svg')); ?>" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-3" x-on:click="open()">
                            <div class="text-[#B1B5C3]"><?php echo __('general.languages-currency'); ?></div>
                            <div class="flex justify-center gap-2">
                                <img class="inline" src="<?php echo e(asset('images/currencies/'.selectedCurrency().'-red.svg')); ?>" />
                                <span class="text-black-primary font-cabin-semibold"><?php echo e(selectedCurrency()); ?></span>
                                <img class="cursor-pointer" src="<?php echo e(asset('images/icons/arrow-down.svg')); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-pink-red w-full h-5"></div>
        <div class="bg-black-primary w-full h-5"></div>
    </div>

    <div
        class="md:hidden fixed w-screen top-[60px] left-0 h-[calc(100dvh_-_20px)]" 
        x-cloak
        x-show="visibility()"

        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="transform -translate-y-full opacity-[90%]"
        x-transition:enter-end="transform translate-y-0 opacity-full"

        x-transition:leave="transition ease-out duration-700"
        x-transition:leave-start="transform translate-y-0 opacity-full"
        x-transition:leave-end="transform -translate-y-full opacity-[90%]"
        >
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('language-selector', [])->html();
} elseif ($_instance->childHasBeenRendered('0SWbgzs')) {
    $componentId = $_instance->getRenderedChildComponentId('0SWbgzs');
    $componentTag = $_instance->getRenderedChildComponentTagName('0SWbgzs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0SWbgzs');
} else {
    $response = \Livewire\Livewire::mount('language-selector', []);
    $html = $response->html();
    $_instance->logRenderedChild('0SWbgzs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

</div>

<?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/components/nav-bar.blade.php ENDPATH**/ ?>