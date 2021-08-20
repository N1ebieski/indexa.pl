<?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::region.category.regionComponent'), [
'region' => $region,
'category' => $category
])->toHtml(); ?>

<div class="list-group list-group-flush mb-3 ramkat">
    <?php if($category->relationLoaded('ancestors')): ?>
    <?php echo $__env->make('idir::web.category.dir.partials.categories', [
    'categories' => $category->ancestors
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="list-group-item d-flex justify-content-between align-items-center">
        <a href="<?php echo e(route('web.category.dir.show', [$category->slug, $region->slug])); ?>" title="<?php echo e($category->name); ?> w <?php echo e(config('app.name_short')); ?>" class="<?php echo e($isUrl(route('web.category.dir.show', [$category->slug, $region->slug]), 'font-weight-bold')); ?>">
            <span><span class="dzieckodziecko"></span><?php echo e(str_repeat('', $category->real_depth)); ?></span>
            <?php if(!empty($category->icon)): ?>
            <i class="<?php echo e($category->icon); ?> text-center icon-<?php echo e(config('app.name_short')); ?>" style="width:1.5rem"></i>
            <?php endif; ?>
            <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e($category->name); ?></span>
        </a>
        <span class="badge badgebig-<?php echo e(config('app.name_short')); ?> badge-pill"><?php echo e($category->morphs_count); ?></span>
    </div>
    <?php if($category->relationLoaded('childrens')): ?>
    <?php echo $__env->make('idir::web.category.dir.partials.categories', [
    'categories' => $category->childrens
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::tag.dir.tagComponent'), [
'limit' => 25,
'cats' => $catsAsArray['self'] ?? null,
    'colors' => ['text-success', 'text-primary', 'text-warning']
])->toHtml(); ?>


<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/category/dir/partials/sidebar.blade.php ENDPATH**/ ?>