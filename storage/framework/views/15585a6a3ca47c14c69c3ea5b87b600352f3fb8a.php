<!--group.blade.php---->
		<div class="card-header text-center bd-<?php echo e(config('app.name_short')); ?> colorw-<?php echo e(config('app.name_short')); ?>">
            <span class="font-weight-bold grupa"><?php echo e($group->name); ?></span>
			<br />
            <?php if($group->prices->isNotEmpty()): ?>
            <span> <span class="three-rem-font font-weight-bold"> <?php echo e($group->prices->sortBy('price')->first()->price); ?> zł.</span><br />
			za <?php echo e(($days = $group->prices->sortBy('price')->first()->days) !== null ? $days . ' ' . mb_strtolower(trans('idir::groups.days')) : mb_strtolower(trans('idir::groups.unlimited'))); ?></span>
            <?php endif; ?>

            <h1 class="card-title pricing-card-title"> <small class="darmowy colorw-<?php echo e(config('app.name_short')); ?>">
                    <?php echo e($group->prices->isNotEmpty() ? trans('', [
                    'limit' => $days !== null ? 
                        mb_strtolower(trans('idir::groups.days')) 
                        : mb_strtolower(trans('idir::groups.unlimited'))
                ]) : trans('idir::groups.payment.0')); ?></small></h1>
            <h4 class="my-0 fw-normal text-center"></h4>
        </div>
        <div>
            <?php if(!empty($group->desc)): ?>
            <div class="card-body flex-wrap">
                <p class="text-danger "><?php echo e($group->desc); ?></p>
                <hr>
            </div>
            <?php endif; ?>
            <ul class="list-group list-group-flush">
                <?php if($group->privileges->isNotEmpty()): ?>
                <?php $__currentLoopData = $group->privileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $privilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3"><?php echo e(__($privilege->name)); ?></div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(!empty($group->border)): ?>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3"><?php echo e(__('card of your site highlighted on listings')); ?></div>
                </li>
                <?php endif; ?>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3">
                        <span><?php echo e(mb_strtolower(trans('idir::groups.apply_status.label'))); ?>: </span>
                        <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e(trans("idir::groups.apply_status.{$group->apply_status}")); ?></span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3">
                        <span><?php echo e(mb_strtolower(trans('idir::groups.max_cats.label'))); ?>: </span>
                        <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e($group->max_cats); ?></span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3">
                        <span><?php echo e(mb_strtolower(trans('idir::groups.url.label'))); ?>: </span>
                        <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e(trans("idir::groups.url.{$group->url}")); ?></span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-<?php echo e(config('app.name_short')); ?>"></i>
                    <div class="ml-3">
                        <span><?php echo e(mb_strtolower(trans('idir::groups.backlink.label'))); ?>: </span>
                        <span class="font-weight-bold text-success-<?php echo e(config('app.name_short')); ?>"><?php echo e(trans("idir::groups.backlink.{$group->backlink}")); ?></span>
                    </div>
                </li>
                <li class="list-group-item text-center ">

                </li>
            </ul>
        </div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/partials/group.blade.php ENDPATH**/ ?>