<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('web.dir.index')); ?>" title="<?php echo e(trans('idir::dirs.route.index')); ?>">
        <?php echo e(trans('idir::dirs.route.index')); ?>

    </a>
</li>
<li class="breadcrumb-item">
    <?php echo e(trans('icore::categories.route.index')); ?>

</li>

<?php if($category->ancestors->count() > 0): ?>
<?php $__currentLoopData = $category->ancestors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ancestor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('web.category.dir.show', [$ancestor->slug, $region->slug])); ?>" title="<?php echo e($ancestor->name); ?>">
        <?php echo e($ancestor->name); ?>

    </a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(isset($region->name)): ?>
<li class="breadcrumb-item">
    <?php echo e($category->name); ?>

</li>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e($region->name); ?>

</li>
<?php else: ?>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e($category->name); ?>

</li>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 order-sm-1 order-md-2">
            <h1 class="h4 border-bottom pb-2">
                <?php if(!empty($category->icon)): ?>
                <i class="<?php echo e($category->icon); ?> text-center icon-show-<?php echo e(config('app.name_short')); ?>"></i>
                <?php endif; ?>
                <span class="text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e(trans('icore::categories.route.show', ['category' => $category->name])); ?></span>
            </h1>
            <div id="filterContent">
                <?php echo $__env->make('idir::web.dir.partials.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($dirs->isNotEmpty()): ?>
                <div id="infinite-scroll">
                    <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('idir::web.dir.partials.dir', [$dir], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('icore::web.partials.pagination', [
                    'items' => $dirs,
                    'next' => true
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php else: ?>
                <p><?php echo e(trans('icore::default.empty')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4 order-sm-2 order-md-1">
            <?php echo $__env->make('idir::web.category.dir.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', [
'title' => [
trans('icore::categories.route.show', ['category' => $category->name]),
$region->name,
$dirs->currentPage() > 1 ?
trans('icore::pagination.page', ['num' => $dirs->currentPage()])
: null
],
'desc' => [trans('icore::categories.route.show', ['category' => $category->name]), $region->name],
'keys' => [trans('icore::categories.route.show', ['category' => $category->name]), $region->name]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/category/dir/show.blade.php ENDPATH**/ ?>