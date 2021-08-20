<?php if($dirs->isNotEmpty()): ?>
<div id="carousel" class="carousel slide pb-3 ramka-carousel rounded shadow" data-ride="carousel">
    <div class="carousel-inner">
        <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($loop->first ? 'active' : null); ?>">
            <div class="row">
                <div class="col-md-9 order-2">
                    <h2 class="h5 border-bottom pb-2 my-2">
                        <a 
                            href="<?php echo e(route('web.dir.show', [$dir->slug])); ?>" 
                            title="<?php echo e($dir->title); ?>"
                        >
                            <?php echo e($dir->title); ?>

                        </a>
                    </h2>
                    <div class="d-flex mb-2">
                        <small class="mr-auto">
                            <i class="far fa-clock mr-1 text-secondary"></i> Dodano <?php echo e($dir->created_at_diff); ?>

                        </small>
                        <small class="ml-auto">
                            <input 
                                id="star-rating<?php echo e($dir->id); ?>" 
                                name="star-rating<?php echo e($dir->id); ?>" 
                                value="<?php echo e($dir->sum_rating); ?>" 
                                data-stars="5" 
                                data-display-only="true"
                                data-size="xs" 
                                class="rating-loading"
                            >
                        </small>
                    </div>
                    <div class="text-break" style="word-break:break-word">
                        <?php echo e($dir->content); ?>...
                    </div>
                </div>
                <?php if($dir->isUrl()): ?>
                <div class="col-md-3 minic order-1">
                    <img 
                        src="<?php echo e($dir->thumbnail_url); ?>" 
                        class="img-fluid border mx-auto d-block"
                        alt="<?php echo e($dir->title); ?>"
                    >
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="bottom-controls d-block w-100 position-relative">
        <a 
            class="carousel-control-prev" 
            href="#carousel" 
            role="button" 
            data-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <ol class="carousel-indicators">
            <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li 
                data-target="#carousel" 
                data-slide-to="<?php echo e($loop->index); ?>" 
                class="<?php echo e($loop->first ? 'active' : null); ?>"
            ></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <a 
            class="carousel-control-next" 
            href="#carousel" 
            role="button" 
            data-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/dir/carousel.blade.php ENDPATH**/ ?>