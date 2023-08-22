<!DOCTYPE html>
<html
    lang="<?php echo e(app('getHTMLLang', [$seoConfiguration])); ?>"
    x-data="{'showMobileNavBar': false, 'htmlOverflowHidden': false}"
    :class="htmlOverflowHidden || showMobileNavBar ? 'overflow-hidden' : ''"
    x-ref="html"
    >
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#E11166" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php if (isset($component)) { $__componentOriginal214f86bd3bb2b806840c6a02fe40b665 = $component; } ?>
<?php $component = App\View\Components\SeoTags::resolve(['seoConfiguration' => $seoConfiguration] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo-tags'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SeoTags::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal214f86bd3bb2b806840c6a02fe40b665)): ?>
<?php $component = $__componentOriginal214f86bd3bb2b806840c6a02fe40b665; ?>
<?php unset($__componentOriginal214f86bd3bb2b806840c6a02fe40b665); ?>
<?php endif; ?>
        
        <?php if (isset($component)) { $__componentOriginalcd2e4385453436bdb8c5de8dab512762 = $component; } ?>
<?php $component = App\View\Components\SeoSchemas::resolve(['seoConfiguration' => $seoConfiguration] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seo-schemas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SeoSchemas::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd2e4385453436bdb8c5de8dab512762)): ?>
<?php $component = $__componentOriginalcd2e4385453436bdb8c5de8dab512762; ?>
<?php unset($__componentOriginalcd2e4385453436bdb8c5de8dab512762); ?>
<?php endif; ?>
       
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hreflang-tags','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hreflang-tags'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                       
		<link rel="shortcut icon" href="<?php echo e(url(asset('favicon.ico'))); ?>">
                
        <link rel="stylesheet"  href="https://rsms.me/inter/inter.css"> 
        <link rel="preload"     href="/css/preload.css" as="style" />
        <link rel="stylesheet"  href="/css/app.css" >

        <?php echo \Livewire\Livewire::styles(); ?>


        <!-- Scripts -->
        <script src="<?php echo e(url(mix('js/app.js'))); ?>" defer></script>
        <script src="<?php echo e(url(mix('js/scripts.js'))); ?>"></script>

        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        
        <input type="hidden" id="app_locale" value="<?php echo e(App::getLocale()); ?>"> 

        <?php if (isset($component)) { $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a = $component; } ?>
<?php $component = App\View\Components\NavBar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NavBar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a)): ?>
<?php $component = $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a; ?>
<?php unset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a); ?>
<?php endif; ?>     

    </head>

    

    <body
        class="overflow-x-hidden relative"
        x-data="{'showOverlay': false}"
        >      

        <div class="max-w-7xl mx-auto">
            <?php echo $__env->yieldContent('body'); ?>

            <?php echo \Livewire\Livewire::scripts(); ?>                     
            
            <?php if(isset($footerImagePath)): ?>
                <?php if (isset($component)) { $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $component; } ?>
<?php $component = App\View\Components\Footer::resolve(['imagePath' => ''.e($footerImagePath).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $component = $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
            <?php endif; ?>            
        </div>

        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/layouts/web.blade.php ENDPATH**/ ?>