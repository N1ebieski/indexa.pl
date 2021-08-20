<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">
    <a href="<?php echo e(route('web.dir.index')); ?>" title="<?php echo e(trans('idir::dirs.route.create.index')); ?>">
        <?php echo e(trans('idir::dirs.route.index')); ?>

    </a>
</li>
<li class="breadcrumb-item">
    <?php echo e(trans('idir::dirs.route.create.index')); ?>

</li>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e(trans('idir::dirs.route.create.1')); ?>

</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('icore::web.partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h3 class="h5 border-bottom pb-2 ">
        <?php echo e(trans('idir::dirs.route.create.1')); ?>

    </h3>
    <div class="progress mb-4">
        <div class="progress-bar" role="progress-bar progress-bar-striped" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>

    <?php if($groups->isNotEmpty()): ?>


<div class="row">
    <div class="col d-flex align-items-center justify-content-center">
        <div class="cd-pricing-switcher mb-3">
            <nav class="credit-tabs">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-normal-tab" data-toggle="tab" href="#nav-normal" 
            role="tab" aria-controls="nav-normal" aria-selected="true">Wpis pojedynczy</a>
            <a class="nav-item nav-link" id="nav-multikod-tab" data-toggle="tab" href="#nav-multikod" 
            role="tab" aria-controls="nav-multikod" aria-selected="false">MultiKod</a>
        </div>
    </nav>
        </div>
    </div>
</div>




    <div class="tab-content" id="nav-tabContent">
        <?php $__currentLoopData = ['normal' => false, 'multikod' => true]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-pane fade show <?php echo e($loop->first ? 'active' : null); ?>" id="nav-<?php echo e($key); ?>" 
        role="tabpanel" aria-labelledby="nav-<?php echo e($key); ?>-tab">     
            <div class="row">
                <?php $__currentLoopData = $groups->filter(function ($item) use ($value) { return str_contains(strtolower($item->name), 'multikod') === $value; }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <?php echo $__env->make('idir::web.dir.partials.group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if($group->isAvailable()): ?>
                        <a href="<?php echo e(route('web.dir.create_2', [$group->id])); ?>"
                            class="cd-select btn w-100 bg-orange group-create-button card-footer mt-auto text-center"><?php echo e(trans('idir::dirs.choose_group')); ?>

                        </a>
                        <?php else: ?>
                        <button type="button" class="w-100 btn btn-lg <?php echo e($group->isAvailable() ? null : 'btn-warning'); ?>">
                            <?php echo trans('idir::dirs.group_limit', [
                            'dirs' => $group->max_models ?? trans('idir::dirs.unlimited'),
                            'dirs_today' =>$group->max_models_daily ?? trans('idir::dirs.unlimited')
                            ]); ?>

                        </button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <p><?php echo e(trans('idir::groups.empty')); ?></p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', [
'title' => [
trans('idir::dirs.route.step', ['step' => 1]),
trans('idir::dirs.route.create.1')
],
'desc' => [trans('idir::dirs.route.create.1')],
'keys' => [trans('idir::dirs.route.create.1')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/create/1.blade.php ENDPATH**/ ?>