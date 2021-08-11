<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
    <a href="<?php echo e(route('web.category.dir.show', [$category->slug, $region->slug])); ?>" title="<?php echo e($category->name); ?>" class="<?php echo e($isUrl(route('web.category.dir.show', [$category->slug, $region->slug]), 'font-weight-bold')); ?> ">
        <span><span class="dziecko"></span><?php echo e(str_repeat('', $category->real_depth)); ?></span>
        <?php if(!empty($category->icon)): ?>
        <i class="<?php echo e($category->icon); ?> text-center" style="width:1.5rem"></i>
        <?php endif; ?>
        <span class="text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e($category->name); ?></span>
    </a>
    <span class="badge badge-<?php echo e(config('app.name_short')); ?> badge-pill"><?php echo e($category->morphs_count); ?></span>
</div>
<?php if($category->relationLoaded('childrens')): ?>
<?php echo $__env->make('idir::web.category.dir.partials.categories', [
'categories' => $category->childrens
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/category/dir/partials/categories.blade.php ENDPATH**/ ?>