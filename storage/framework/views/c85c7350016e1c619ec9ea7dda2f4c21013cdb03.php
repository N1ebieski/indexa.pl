<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e(trans('idir::dirs.route.index')); ?>

</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1 class="h5 border-bottom pb-2 d-flex">
    <div class="mr-auto my-auto">
        <i class="far fa-fw fa-folder-open"></i>
        <span> <?php echo e(trans('idir::dirs.route.index')); ?></span>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.create')): ?>
    <div class="ml-auto text-right responsive-btn-group">
        <a 
            href="<?php echo e(route('admin.dir.create_1')); ?>" 
            role="button" 
            class="btn btn-primary text-nowrap"
        >
            <i class="far fa-plus-square"></i>
            <span class="d-none d-sm-inline"><?php echo e(trans('icore::default.create')); ?></span>
        </a>
    </div>
    <?php endif; ?>
</h1>
<div id="filterContent">
    <?php echo $__env->make('idir::admin.dir.partials.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($dirs->isNotEmpty()): ?>
    <form 
        action="<?php echo e(route('admin.dir.destroy_global')); ?>" 
        method="post" 
        id="selectForm"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.delete')): ?>
        <div class="row my-2">
            <div class="col my-auto">
                <div class="custom-checkbox custom-control">
                    <input type="checkbox" class="custom-control-input" id="selectAll">
                    <label class="custom-control-label" for="selectAll">
                        <?php echo e(trans('icore::default.select_all')); ?>

                    </label>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div id="infinite-scroll">
            <?php $__currentLoopData = $dirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('idir::admin.dir.partials.dir', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('icore::admin.partials.pagination', [
                'items' => $dirs
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.delete')): ?>
        <div class="select-action rounded">
            <button 
                type="button"             
                class="btn btn-danger submit" 
                data-toggle="confirmation"
                data-btn-ok-label=" <?php echo e(trans('icore::default.yes')); ?>" 
                data-btn-ok-icon-class="fas fa-check mr-1"
                data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover" 
                data-btn-cancel-label=" <?php echo e(trans('icore::default.cancel')); ?>"
                data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                data-btn-cancel-icon-class="fas fa-ban mr-1"
                data-title="<?php echo e(trans('icore::default.confirm')); ?>"
            >
                <i class="far fa-trash-alt"></i>
                <span><?php echo e(trans('icore::default.delete_global')); ?></span>
            </button>
        </div>
        <?php endif; ?>
    </form>
    <?php else: ?>
    <p><?php echo e(trans('icore::default.empty')); ?></p>
    <?php endif; ?>
</div>

<?php $__env->startComponent('icore::admin.partials.modal'); ?>
<?php $__env->slot('modal_id', 'editModal'); ?>
<?php $__env->slot('modal_size', 'modal-lg'); ?>
<?php $__env->slot('modal_title'); ?>
<i class="far fa-edit"></i>
<span> <?php echo e(trans('idir::dirs.route.edit.index')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('icore::admin.partials.modal'); ?>
<?php $__env->slot('modal_id', 'createBanDirModal'); ?>
<?php $__env->slot('modal_title'); ?>
<i class="fas fa-user-slash"></i>
<span> <?php echo e(trans('icore::bans.route.create')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('icore::admin.partials.modal'); ?>
<?php $__env->slot('modal_id', 'showReportDirModal'); ?>
<?php $__env->slot('modal_title'); ?>
<span><?php echo e(trans('icore::reports.route.show')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('icore::admin.partials.modal'); ?>
<?php $__env->slot('modal_id', 'showPaymentLogsDirModal'); ?>
<?php $__env->slot('modal_title'); ?>
<span><?php echo e(trans('idir::payments.route.show_logs')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php if(!isset($__env->__pushonce_script_map)): $__env->__pushonce_script_map = true; $__env->startPush('script'); ?>
<script 
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.googlemap.api_key')); ?>&callback=initMap" 
    type="text/javascript"
    async 
    defer     
></script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('idir.layout') . '::admin.layouts.layout', [
    'title' => [
        trans('idir::dirs.route.index'),
        $dirs->currentPage() > 1 ?
            trans('icore::pagination.page', ['num' => $dirs->currentPage()])
            : null
    ],
    'desc' => [trans('idir::dirs.route.index')],
    'keys' => [trans('idir::dirs.route.index')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/dir/index.blade.php ENDPATH**/ ?>