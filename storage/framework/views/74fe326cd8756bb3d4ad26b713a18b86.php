<?php if (! empty(trim($__env->yieldContent('title')))): ?>
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
<?php else: ?>
    <title><?php echo e(config('app.name')); ?></title>
<?php endif; ?>
<?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/layouts/partials/default-web-title.blade.php ENDPATH**/ ?>