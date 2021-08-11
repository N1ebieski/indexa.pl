<div class="mb-3 tagis rounded">
<div id="map-poland">
    <ul class="poland" style="display:none">
        <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="pl<?php echo e($loop->iteration); ?>">
            <a 
                href="<?php echo e(route('web.category.dir.show', [$category->slug, $r->slug === $region->slug ? null : $r->slug])); ?>"
                class="<?php echo e($r->slug === $region->slug ? 'active-region' : null); ?>"
            >
                <?php echo e($r->name); ?>

            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
</div><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/region/category/region.blade.php ENDPATH**/ ?>