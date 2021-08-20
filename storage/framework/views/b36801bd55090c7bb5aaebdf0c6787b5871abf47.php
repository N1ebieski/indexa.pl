<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e(trans('idir::dirs.route.index')); ?>

</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::dir.carouselComponent'), [
        'max_content' => 450
    ])->toHtml(); ?>

    <div class="row mt-3">
        <div class="col-md-8 order-sm-1 order-md-2 mb-3">
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
        <div class="col-md-4 order-sm-2 order-md-1 mb-3">
		        <div class="tagis rounded">
            <?php echo $__env->make('idir::web.dir.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', [
    'title' => [
        trans('idir::dirs.route.index'),
        $dirs->currentPage() > 1 ?
            trans('icore::pagination.page', ['num' => $dirs->currentPage()])
            : null
    ],
    'desc' => [trans('idir::dirs.route.index')],
    'keys' => [trans('idir::dirs.route.index')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/index.blade.php ENDPATH**/ ?>