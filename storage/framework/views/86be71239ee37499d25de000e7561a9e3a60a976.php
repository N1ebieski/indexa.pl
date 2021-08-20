<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(trans('icore::friends.route.index')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
        <h1 class="h4 border-bottom pb-2">
            <i class="fa fa-anchor"></i>&nbsp;&nbsp;<?php echo e(trans('icore::friends.friends')); ?>

        </h1>
    <div class="ramka2">

        <ul class="list-unstyled text-muted">

            <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mb-2"><span class="text-sm"><i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                    <?php echo $dir->link; ?>

                </span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li class="mb-2"><span class="text-sm"><i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                    <a href="https://hanza.pl" target="_blank" title="Nieruchomości nad morzem">Nieruchomości nad morzem</a>
                </span></li>

        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', [
'title' => [trans('icore::friends.route.index')],
'desc' => [trans('icore::friends.route.index')],
'keys' => [trans('icore::friends.route.index')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/friend/index.blade.php ENDPATH**/ ?>