<?php if($dirs->isNotEmpty()): ?>
<!---14:59:21--->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($loop->first ? 'active' : null); ?>">
            <div class="row polecamy">
                <?php if($dir->isUrl()): ?>
                <a href="<?php echo e(route('web.dir.show', [$dir->slug])); ?>" title="<?php echo e($dir->title); ?>">
                    <div class="col">
                        <img src="<?php echo e($dir->thumbnail_url); ?>" class="img-fluid mx-auto d-block" alt="<?php echo e($dir->title); ?>">
                    </div>
                    <?php endif; ?>
                    <div class="col kontener-polecamy">
                        <div class="polecamy-<?php echo e(config('app.name_short')); ?>">
                            <h2 class="h66">
                                <?php echo e($dir->title); ?>

                            </h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/dir/carouselite.blade.php ENDPATH**/ ?>