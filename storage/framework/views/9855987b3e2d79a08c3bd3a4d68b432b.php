<?php if($schemas): ?>
    <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script type="application/ld+json"><?php echo json_encode($schema->schema, JSON_UNESCAPED_SLASHES); ?></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/vagrant/new-sites/reykjavik-auto/resources/views/components/seo-schemas.blade.php ENDPATH**/ ?>