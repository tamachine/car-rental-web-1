<?php if($seoConfiguration): ?>
    <?php if($seoConfiguration->nofollow && $seoConfiguration->noindex): ?>
        <meta name="robots" content="nofollow, noindex">
    <?php elseif($seoConfiguration->nofollow): ?>
        <meta name="robots" content="nofollow">
    <?php elseif($seoConfiguration->noindex): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>    

    <?php if(!empty($seoConfiguration->meta_title)): ?>
        <title><?php echo e($seoConfiguration->meta_title); ?></title>
    <?php else: ?>
        <?php echo $__env->make('layouts.partials.default-web-title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(!empty($seoConfiguration->meta_description)): ?>
        <meta name="description" content="<?php echo $seoConfiguration->meta_description; ?>">
    <?php endif; ?>   

    <?php if(!empty($seoConfiguration->canonical)): ?>
        <link rel="canonical" href="<?php echo $seoConfiguration->canonical; ?>" />
    <?php endif; ?>
<?php else: ?>
    <?php echo $__env->make('layouts.partials.default-web-title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/components/seo-tags.blade.php ENDPATH**/ ?>