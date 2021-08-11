<?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-0">
            <li class="breadcrumb-item">
                <a 
                    href="<?php echo e(route('web.home.index')); ?>" 
                    title="<?php echo e(trans('icore::home.route.index')); ?>"
                >
                    <?php echo e(trans('icore::home.route.index')); ?>

                </a>
            </li>
            <?php echo $__env->yieldContent('breadcrumb'); ?>
        </ol>
    </nav>
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/partials/breadcrumb.blade.php ENDPATH**/ ?>