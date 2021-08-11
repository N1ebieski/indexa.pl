<?php $__env->startSection('content'); ?>
<div class="jumbotron-home jumbotron-fluid m-0 background-<?php echo e(config('app.name_short')); ?>">
    <div class="container">
        <div class="card mb-3 border5" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-xl-2 col-md-12 col-12 glowna-<?php echo e(config('app.name_short')); ?>">
                </div>
                <div class="col-xl-7 col-md-6 col-12">
                    <div class="mb-0">
                        <div class="witaj-body witaj-<?php echo e(config('app.name_short')); ?>">
                            <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::statComponent'), [])->toHtml(); ?>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 col-12 lewar text-center">
                    <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::dir.CarouselLiteComponent'), [
                    'limit' => null,
                    'max_content' => 0,
                    'shuffle' => true
                    ])->toHtml(); ?>
                </div>
            </div>
        </div>
        <div class="w-md-100 mx-auto">
            <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::category.dir.gridComponent'), [
            'cols' => 3,
            'category_count' => true,
            'category_icon' => true,
            'children_count' => true,
            'children_limit' => 4,
            'children_shuffle' => true
            ])->toHtml(); ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <?php if($dirs->isNotEmpty()): ?>
        <div class="col-md-8 order-sm-1 order-md-2">
            <div>
                <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('idir::web.dir.partials.dir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-md-4 order-sm-2 order-md-1">
            <div class="rounded komentarze">
                <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::comment.dir.commentComponent'), [])->toHtml(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php echo $__env->make('icore::web.partials.toasts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/home/index.blade.php ENDPATH**/ ?>