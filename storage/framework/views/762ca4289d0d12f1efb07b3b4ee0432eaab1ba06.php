<?php if($categories->isNotEmpty()): ?>
<div class="row">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-<?php echo e(floor(12/$cols)); ?> col-md-6 col-12 mb-4">
        <div class="card bg-light h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <?php if($category_icon === true && !empty($category->icon)): ?>
                <div style="width:1rem" class="align-self-center text-center">
                    <i class="<?php echo e($category->icon); ?> p-1 icon-<?php echo e(config('app.name_short')); ?>" style=""></i>
                </div>
                <?php endif; ?>
                    <a 
                        href="<?php echo e(route('web.category.dir.show', $category->slug)); ?>" 
                        title="<?php echo e($category->name); ?>"
                        class="<?php echo e($isUrl(route('web.category.dir.show', $category->slug), 'font-weight-bold')); ?>"
                    >
                        <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e($category->name); ?></span>
                    </a>
                    <?php if(isset($category->nested_morphs_count)): ?>
                    <span class="badge badgebig-<?php echo e(config('app.name_short')); ?> align-self-center">
                        <?php echo e($category->nested_morphs_count); ?>

                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($category->childrens->isNotEmpty()): ?>
            <div class="d-flex">
                <ul class="list-group list-group-flush flex-grow-1">
                <?php $__currentLoopData = $category->childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between ">
                        <a 
                            href="<?php echo e(route('web.category.dir.show', $children->slug)); ?>" 
                            title="<?php echo e($children->name); ?>"
                            class="<?php echo e($isUrl(route('web.category.dir.show', $children->slug), 'font-weight-bold')); ?>"
                        >
                        <span class="text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e($children->name); ?></span>
                        </a>
                        <?php if(isset($children->morphs_count)): ?>
                        <span class="badge badge-<?php echo e(config('app.name_short')); ?> badge-pill align-self-center">
                            <?php echo e($children->morphs_count); ?>

                        </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/category/dir/grid.blade.php ENDPATH**/ ?>