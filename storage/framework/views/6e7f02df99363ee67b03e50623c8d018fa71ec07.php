<?php $dir = app('N1ebieski\IDir\Models\Dir'); ?>
<?php $report = app('N1ebieski\IDir\Models\Report\Dir\Report'); ?>

<?php $__env->startComponent('icore::admin.partials.modal'); ?>
<?php $__env->slot('modal_id', 'filterModal'); ?>

<?php $__env->slot('modal_title'); ?>
<i class="fas fa-sort-amount-up"></i>
<span> <?php echo e(trans('icore::filter.filter_title')); ?></span>
<?php $__env->endSlot(); ?>

<?php $__env->slot('modal_body'); ?>
<div class="form-group">
    <label for="FormSearch">
        <?php echo e(trans('icore::filter.search.label')); ?>

    </label>
    <input 
        type="text" 
        class="form-control" 
        id="FormSearch" 
        placeholder="<?php echo e(trans('icore::filter.search.placeholder')); ?>"
        name="filter[search]" 
        value="<?php echo e(isset($filter['search']) ? $filter['search'] : ''); ?>"
    >
</div>
<div class="form-group">
    <label for="FormStatus">
        <?php echo e(trans('icore::filter.filter')); ?> "<?php echo e(trans('icore::filter.status.label')); ?>"
    </label>
    <select 
        class="form-control custom-select" 
        id="FormVisible" 
        name="filter[status]"
    >
        <option value="">
            <?php echo e(trans('icore::filter.default')); ?>

        </option>
        <option 
            value="<?php echo e($dir::ACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::ACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::ACTIVE)); ?>

        </option>
        <option 
            value="<?php echo e($dir::INACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::INACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::INACTIVE)); ?>

        </option>
        <option 
            value="<?php echo e($dir::PAYMENT_INACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::PAYMENT_INACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::PAYMENT_INACTIVE)); ?>

        </option>
        <option 
            value="<?php echo e($dir::BACKLINK_INACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::BACKLINK_INACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::BACKLINK_INACTIVE)); ?>

        </option>
        <option 
            value="<?php echo e($dir::STATUS_INACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::STATUS_INACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::STATUS_INACTIVE)); ?>

        </option>
        <option 
            value="<?php echo e($dir::INCORRECT_INACTIVE); ?>" 
            <?php echo e(($filter['status'] === $dir::INCORRECT_INACTIVE) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('idir::dirs.status.'.$dir::INCORRECT_INACTIVE)); ?>

        </option>
    </select>
</div>
<?php if($groups->isNotEmpty()): ?>
<div class="form-group">
    <label for="group">
        <?php echo e(trans('icore::filter.filter')); ?> "<?php echo e(trans('idir::filter.group')); ?>"
    </label>
    <select 
        class="form-control custom-select" 
        id="group" 
        name="filter[group]"
    >
        <option value="">
            <?php echo e(trans('icore::filter.default')); ?>

        </option>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option 
            value="<?php echo e($group->id); ?>" 
            <?php echo e(($filter['group'] !== null && $filter['group']->id == $group->id) ? 'selected' : ''); ?>

        >
            <?php echo e($group->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php endif; ?>
<?php if($categories->isNotEmpty()): ?>
<div class="form-group">
    <label for="category">
        <?php echo e(trans('icore::filter.filter')); ?> "<?php echo e(trans('icore::filter.category')); ?>"
    </label>
    <select 
        class="form-control custom-select" 
        id="category" 
        name="filter[category]"
    >
        <option value="">
            <?php echo e(trans('icore::filter.default')); ?>

        </option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cats->real_depth == 0): ?>
                <optgroup label="----------"></optgroup>
            <?php endif; ?>
        <option 
            value="<?php echo e($cats->id); ?>" 
            <?php echo e(($filter['category'] !== null && $filter['category']->id == $cats->id) ? 'selected' : ''); ?>

        >
            <?php echo e(str_repeat('-', $cats->real_depth)); ?> <?php echo e($cats->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php endif; ?>
<div class="form-group">
    <label for="FormReport">
        <?php echo e(trans('icore::filter.filter')); ?> "<?php echo e(trans('icore::filter.report.label')); ?>"
    </label>
    <select 
        class="form-control custom-select" 
        id="FormReport" 
        name="filter[report]"
    >
        <option value="">
            <?php echo e(trans('icore::filter.default')); ?>

        </option>
        <option 
            value="<?php echo e($report::REPORTED); ?>" 
            <?php echo e(($filter['report'] === $report::REPORTED) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('icore::filter.report.'.$report::REPORTED)); ?>

        </option>
        <option 
            value="<?php echo e($report::UNREPORTED); ?>" 
            <?php echo e(($filter['report'] === $report::UNREPORTED) ? 'selected' : ''); ?>

        >
            <?php echo e(trans('icore::filter.report.'.$report::UNREPORTED)); ?>

        </option>
    </select>
</div>
<div class="d-inline">
    <button type="button" class="btn btn-primary btn-send" id="filterFilter">
        <i class="fas fa-check"></i>
        <span><?php echo e(trans('icore::default.apply')); ?></span>
    </button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fas fa-ban"></i>
        <span><?php echo e(trans('icore::default.cancel')); ?></span>
    </button>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->startComponent('icore::admin.partials.jsvalidation'); ?>
<?php echo JsValidator::formRequest('N1ebieski\IDir\Http\Requests\Admin\Dir\IndexRequest', '#filter');; ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/dir/partials/filter_filter.blade.php ENDPATH**/ ?>