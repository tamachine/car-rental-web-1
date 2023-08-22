<?php $__currentLoopData = ['x-default', App\Helpers\Language::defaultCode()]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hreflang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="alternate" hreflang="<?php echo e($hreflang); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL(false, url()->current(), Route::current()->parameters(), false)); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = App\Helpers\Language::availableCodes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($code != App\Helpers\Language::defaultCode()): ?>    
        <link rel="alternate" hreflang="<?php echo e($code); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($code, null, Route::current()->parameters(), true)); ?>" />
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/components/hreflang-tags.blade.php ENDPATH**/ ?>