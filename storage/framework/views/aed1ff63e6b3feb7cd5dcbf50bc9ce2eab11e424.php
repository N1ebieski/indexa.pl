<?php if(session()->has('success')): ?>
<div class="alert alert-success alert-time" role="alert">
    <button 
        type="button" 
        class="text-dark close" 
        data-dismiss="alert" 
        aria-label="<?php echo e(trans('icore::default.close')); ?>"
    >
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e(session()->get('success')); ?>

</div>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
<div class="alert alert-warning alert-time" role="alert">
    <button 
        type="button" 
        class="text-dark close" 
        data-dismiss="alert" 
        aria-label="<?php echo e(trans('icore::default.close')); ?>"
    >
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e(session()->get('warning')); ?>    
</div>
<?php endif; ?>

<?php if(session()->has('danger')): ?>
<div class="alert alert-danger alert-time" role="alert">
    <button 
        type="button" 
        class="text-dark close" 
        data-dismiss="alert" 
        aria-label="<?php echo e(trans('icore::default.close')); ?>"
    >
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo e(session()->get('danger')); ?>

</div>
<?php endif; ?>

<?php if(session()->has('alertErrors') && $errors->any()): ?>
<div class="alert alert-danger alert-time" role="alert">
    <div class="d-flex justify-content-between">
        <ul class="list-unstyled mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <button 
            type="button" 
            class="text-dark close mb-auto" 
            data-dismiss="alert" 
            aria-label="<?php echo e(trans('icore::default.close')); ?>"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
</div>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/vendor/n1ebieski/icore/src/Providers/../../resources/views/admin/partials/alerts.blade.php ENDPATH**/ ?>