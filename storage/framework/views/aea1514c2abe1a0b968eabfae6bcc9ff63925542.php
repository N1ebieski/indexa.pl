<?php if(collect($tags)->isNotEmpty()): ?>
<div class="text-center">
    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span>
            <a 
                href="<?php echo e(route('web.tag.dir.show', $tag->normalized)); ?>" 
                title="<?php echo e($tag->name); ?>"
                class="h<?php echo e(rand(1, 6)); ?> <?php echo e(is_array($colors) ? $colors[array_rand($colors)] : null); ?>"
            >
                <?php echo e($tag->name); ?>

            </a>
        </span>
        <span><?php echo e((!$loop->last) ? ' ' : ''); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/tag/dir/tag.blade.php ENDPATH**/ ?>