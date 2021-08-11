<?php if($comments->isNotEmpty()): ?>
<h3 class="h5 border-bottom pb-2 mb-3">
    <?php echo e(trans('icore::comments.latest')); ?>

</h3>
<div>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('idir::web.components.comment.dir.partials.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/comment/dir/comment.blade.php ENDPATH**/ ?>