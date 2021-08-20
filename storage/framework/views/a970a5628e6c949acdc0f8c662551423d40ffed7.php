<?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.home.index')); ?>" title="Dashboard">
                Dashboard
            </a>
        </li>
        <?php echo $__env->yieldContent('breadcrumb'); ?>
    </ol>
</nav>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/vendor/n1ebieski/icore/src/Providers/../../resources/views/admin/partials/breadcrumb.blade.php ENDPATH**/ ?>