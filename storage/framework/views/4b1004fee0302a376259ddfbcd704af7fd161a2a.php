<?php $__env->startSection('thumbnail'); ?>
<div class="mt-2 d-flex flex-column" style="width:90px;height:68px">
    <div class="thumbnail d-inline position-relative">
        <img 
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
            data-src="<?php echo e($dir->thumbnail_url); ?>" 
            class="lazy img-fluid border"
            alt="<?php echo e($dir->title); ?>" 
            title="<?php echo e($dir->title); ?>"
        >
    </div>
    <a 
        href="#" 
        data-route="<?php echo e(route('admin.thumbnail.dir.reload', [$dir->id])); ?>" 
        class="badge badge-primary reloadThumbnail"
    >
        <?php echo e(trans('idir::dirs.reload_thumbnail')); ?>

    </a>
</div>
<?php $__env->stopSection(true); ?>
<div 
    id="row<?php echo e($dir->id); ?>" 
    class="row border-bottom py-3 position-relative transition"
    data-id="<?php echo e($dir->id); ?>"
>
    <div class="col my-auto d-flex w-100 justify-content-between">
        <div class="custom-control custom-checkbox">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.delete')): ?>
            <input 
                name="select[]" 
                type="checkbox" 
                class="custom-control-input select" 
                id="select<?php echo e($dir->id); ?>" 
                value="<?php echo e($dir->id); ?>"
            >
            <label class="custom-control-label" for="select<?php echo e($dir->id); ?>">
            <?php endif; ?>
            <ul class="list-unstyled mb-0 pb-0">
                <li>
                    <?php echo $dir->title_as_link; ?>

                    
                    <?php if($dir->reports_count > 0): ?>
                    <span>
                        <a 
                            href="#" 
                            class="badge badge-danger show" 
                            data-toggle="modal"
                            data-route="<?php echo e(route('admin.report.dir.show', [$dir->id])); ?>"
                            data-target="#showReportDirModal"
                        >
                            <?php echo e(trans('icore::reports.route.show')); ?>: <?php echo e($dir->reports_count); ?>

                        </a>
                    </span>
                    <?php endif; ?>
                </li>
                <li class="text-break" style="word-break:break-word">
                    <span id="content.<?php echo e($dir->id); ?>">
                        <?php echo $dir->short_content; ?>...
                    </span>
                    <a href="#" class="badge badge-primary checkContent">
                        <?php echo e(trans('idir::dirs.check_content')); ?>

                    </a>
                </li>
                <?php if($dir->notes): ?>
                <li class="text-break font-weight-bold" style="word-break:break-word">
                    <?php echo e($dir->notes); ?>

                </li>
                <?php endif; ?>                
                <?php if($dir->group->fields->isNotEmpty()): ?>
                <?php $__currentLoopData = $dir->group->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value = optional($dir->fields->where('id', $field->id)->first())->decode_value): ?>
                <li class="text-break" style="word-break:break-word">
                    <?php echo e($field->title); ?>: 
                    <span>
                    <?php switch($field->type):
                        case ('input'): ?>
                        <?php case ('textarea'): ?>
                        <?php case ('select'): ?>
                            <?php echo e($value); ?>

                            <?php break; ?>

                        <?php case ('multiselect'): ?>
                        <?php case ('checkbox'): ?>
                            <?php echo e(implode(', ', $value)); ?>

                            <?php break; ?>

                        <?php case ('regions'): ?>
                            <?php echo e(implode(', ', $dir->regions->pluck('name')->toArray())); ?>

                            <?php break; ?>

                        <?php case ('image'): ?>
                            <br>
                            <img class="img-fluid" src="<?php echo e(app('filesystem')->url($value)); ?>">
                            <?php break; ?>

                        <?php case ('map'): ?>
                            <?php echo e($value[0]->lat); ?> : <?php echo e($value[0]->long); ?>

                            <?php break; ?>
                    <?php endswitch; ?>
                    </span>
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>                
            </ul>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.delete')): ?>
            </label>
            <?php endif; ?>            
            <div class="d-flex flex-column">
                <ul class="list-unstyled mb-0 pb-0 flex-grow-1">
                    <?php if($dir->tagList): ?>
                    <li class="text-break" style="word-break:break-word">
                        <small>
                            <?php echo e(trans('idir::dirs.tags.label')); ?>: <?php echo e($dir->tagList); ?>

                        </small>
                    </li>
                    <?php endif; ?>
                             <?php $__currentLoopData = $dir->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item mr-3">
                                <i class="fa fa-signal mr-1 "></i>
                                <?php echo e(trans("icore::stats.{$stat->slug}")); ?>: <b><?php echo e($stat->pivot->value); ?></b>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<li class="list-inline-item mr-3"><i class="far fa-address-card"></i> <?php echo e($dir->id); ?></li>
					<li><?php echo $dir->link; ?></li>
                   <?php if($dir->categories->isNotEmpty()): ?>
                    <li>
                        <small>
                            <span>
                                <?php echo e(trans('icore::categories.categories.label')); ?>:
                            </span> 
                            <span>
                                <?php $__currentLoopData = $dir->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('admin.dir.index', ['filter[category]' => $category->id])); ?>"
                                title="<?php echo e($category->name); ?>">
                                    <?php echo e($category->name); ?>

                                </a><?php echo e((!$loop->last) ? ', ' : ''); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </small>
                    </li>
                    <?php endif; ?>                   
                    <li>
                        <small>
                            <span>
                                <?php echo e(trans('idir::dirs.group')); ?>:
                            </span>
                            <span>
                                <a 
                                    href="<?php echo e(route('admin.dir.index', ['filter[group]' => $dir->group->id])); ?>"
                                    title="<?php echo e($dir->group->name); ?>"
                                >
                                    <?php echo e($dir->group->name); ?>

                                </a>
                            </span>
                        </small>
                        <?php if($dir->group->prices->isNotEmpty() && $dir->payments->isNotEmpty()): ?>
                        <span>
                            <a 
                                href="#" 
                                class="badge badge-warning show" 
                                data-toggle="modal"
                                data-route="<?php echo e(route('admin.payment.dir.show_logs', [$dir->id])); ?>"
                                data-target="#showPaymentLogsDirModal"
                            >
                                <?php echo e(trans('idir::payments.route.show_logs')); ?>

                            </a>
                        </span>
                        <?php endif; ?>
                    </li>
                    <?php if(isset($dir->user)): ?>
                    <li>
                        <small>
                            <span>
                                <?php echo e(trans('idir::dirs.author')); ?>:
                            </span>
                            <span>
                                <a 
                                    href="<?php echo e(route('admin.dir.index', ['filter[author]' => $dir->user->id])); ?>"
                                    title="<?php echo e($dir->user->name); ?>"
                                >
                                    <?php echo e($dir->user->name); ?>

                                </a>
                            </span>
                            <span>
                                <a 
                                    href="<?php echo e(route('admin.dir.index', ['filter[search]' => "user:\"{$dir->user->ip}\""])); ?>"
                                    title="<?php echo e($dir->user->ip); ?>"
                                >
                                    <?php echo e($dir->user->ip); ?>

                                </a>
                            </span>
                        </small>
                    </li>
                    <?php endif; ?>
                    <?php if($dir->privileged_at !== null): ?>
                    <li>
                        <small>
                            <?php echo e(trans('idir::dirs.privileged_to')); ?>: 
                        </small>
                        <small>
                            <?php echo e($dir->privileged_to !== null ? $dir->privileged_to_diff : trans('idir::dirs.unlimited')); ?>

                        </small>
                    </li>
                    <?php endif; ?>                    
                    <li>
                        <small>
                            <?php echo e(trans('icore::filter.created_at')); ?>: <?php echo e($dir->created_at_diff); ?>

                        </small>
                    </li>
                    <li>
                        <small>
                            <?php echo e(trans('icore::filter.updated_at')); ?>: <?php echo e($dir->updated_at_diff); ?>

                        </small>
                    </li>
					<li>adres www: <?php echo $dir->url_as_link; ?></li>
                </ul>
                <?php if($dir->isUrl() && !$dir->isNotOk()): ?>
                <div class="mb-3 d-sm-none">
                    <?php echo $__env->yieldContent('thumbnail'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-right ml-3 d-flex flex-column">
            <div class="responsive-btn-group">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.edit')): ?>
                <div class="btn-group-vertical">
                    <button 
                        data-toggle="modal" 
                        data-target="#editModal"
                        data-route="<?php echo e(route('admin.dir.edit', [$dir->id])); ?>"
                        type="button" class="btn btn-primary edit"
                    >
                        <i class="far fa-edit"></i>
                        <span class="d-none d-sm-inline"> <?php echo e(trans('icore::default.edit')); ?></span>
                    </button>
                    <a 
                        class="btn btn-primary align-bottom" 
                        href="<?php echo e(route('admin.dir.edit_full_1', [$dir->id])); ?>"
                        role="button" 
                        target="_blank" 
                        rel="noopener"
                    >
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-sm-inline"> <?php echo e(trans('icore::default.editFull')); ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.status')): ?>
                <?php if($dir->isUpdateStatus()): ?>
                <button 
                    data-status="<?php echo e($dir::ACTIVE); ?>" 
                    type="button" 
                    class="btn btn-success statusDir"
                    data-route="<?php echo e(route('admin.dir.update_status', [$dir->id])); ?>" 
                    data-id="<?php echo e($dir->id); ?>"
                    <?php echo e($dir->status == $dir::ACTIVE ? 'disabled' : ''); ?>

                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        <?php echo e(trans('icore::default.active')); ?>

                    </span>
                </button>
                <div class="btn-group-vertical">
                    <button 
                        data-status="<?php echo e($dir::INACTIVE); ?>" 
                        type="button" 
                        class="btn btn-warning statusDir"
                        data-route="<?php echo e(route('admin.dir.update_status', [$dir->id])); ?>" 
                        data-id="<?php echo e($dir->id); ?>"
                        <?php echo e($dir->status == $dir::INACTIVE ? 'disabled' : ''); ?>

                    >
                        <i class="fas fa-toggle-off"></i>
                        <span class="d-none d-sm-inline"> 
                            <?php echo e(trans('icore::default.inactive')); ?>

                        </span>
                    </button>
                    <button 
                        data-status="<?php echo e($dir::INCORRECT_INACTIVE); ?>" 
                        type="button" 
                        class="btn btn-warning"
                        data-route="<?php echo e(route('admin.dir.update_status', [$dir->id])); ?>"
                        data-toggle="dir-confirmation-reason" 
                        data-id="<?php echo e($dir->id); ?>" 
                        data-btn-ok-label=" <?php echo e(trans('icore::default.yes')); ?>" 
                        data-btn-ok-icon-class="fas fa-check mr-1"
                        data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover statusDir" 
                        data-btn-cancel-label=" <?php echo e(trans('icore::default.cancel')); ?>"
                        data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                        data-btn-cancel-icon-class="fas fa-ban mr-1"
                        data-title="<?php echo e(trans('idir::dirs.confirm.correct')); ?>"
                        data-reasons="<?php echo e(json_encode(config('idir.dir.reasons'))); ?>" 
                        data-reasons-label="<?php echo e(trans('idir::dirs.reason.label')); ?>"
                        data-reasons-custom="<?php echo e(trans('idir::dirs.reason.custom')); ?>"                        
                        <?php echo e($dir->status == $dir::INCORRECT_INACTIVE ? 'disabled' : ''); ?>

                    >
                        <i class="far fa-times-circle"></i>
                        <span class="d-none d-sm-inline"> 
                            <?php echo e(trans('idir::dirs.correct')); ?>

                        </span>
                    </button>                    
                </div>
                <?php elseif($dir->isNotOk()): ?>
                <button 
                    type="button" 
                    class="btn btn-success"
                    data-route="<?php echo e(route('admin.status.delay', [$dir->getRelation('status')->id])); ?>" 
                    data-id="<?php echo e($dir->id); ?>"
                    data-toggle="dir-confirmation-delay" 
                    data-btn-ok-label="<?php echo e(trans('icore::default.yes')); ?>" 
                    data-btn-ok-icon-class="fas fa-check mr-1"
                    data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover delayDir" 
                    data-btn-cancel-label="<?php echo e(trans('icore::default.cancel')); ?>"
                    data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                    data-btn-cancel-icon-class="fas fa-ban mr-1"
                    data-title="<?php echo e(trans('idir::status.confirm.delay')); ?>"
                    data-delays="<?php echo e(json_encode(config('idir.dir.status.delays'))); ?>" 
                    data-delays-label="<?php echo e(trans('idir::status.delay_for.label')); ?>"
                    data-delays-custom="<?php echo e(trans('idir::status.delay_for.custom')); ?>"
                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        <?php echo e(trans('idir::status.delay')); ?>

                    </span>
                </button>
                <?php elseif($dir->isBacklinkNotOk()): ?>
                <button 
                    type="button" 
                    class="btn btn-success"
                    data-route="<?php echo e(route('admin.backlink.delay', [$dir->getRelation('backlink')->id])); ?>" 
                    data-id="<?php echo e($dir->id); ?>"
                    data-toggle="dir-confirmation-delay" 
                    data-btn-ok-label="<?php echo e(trans('icore::default.yes')); ?>" 
                    data-btn-ok-icon-class="fas fa-check mr-1"
                    data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover delayDir" 
                    data-btn-cancel-label="<?php echo e(trans('icore::default.cancel')); ?>"
                    data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                    data-btn-cancel-icon-class="fas fa-ban mr-1"
                    data-title="<?php echo e(trans('idir::backlinks.confirm.delay')); ?>"
                    data-delays="<?php echo e(json_encode(config('idir.dir.backlink.delays'))); ?>" 
                    data-delays-label="<?php echo e(trans('idir::backlinks.delay_for.label')); ?>"
                    data-delays-custom="<?php echo e(trans('idir::backlinks.delay_for.custom')); ?>"
                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        <?php echo e(trans('idir::backlinks.delay')); ?>

                    </span>
                </button>    
                <?php endif; ?>
                <?php endif; ?>
                <div class="btn-group-vertical">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.delete')): ?>
                    <button 
                        class="btn btn-danger" 
                        data-status="delete" 
                        data-toggle="dir-confirmation-reason"
                        data-route="<?php echo e(route('admin.dir.destroy', [$dir->id])); ?>" 
                        data-id="<?php echo e($dir->id); ?>"
                        type="button" 
                        data-btn-ok-label=" <?php echo e(trans('icore::default.yes')); ?>" 
                        data-btn-ok-icon-class="fas fa-check mr-1"
                        data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover destroyDir" 
                        data-btn-cancel-label=" <?php echo e(trans('icore::default.cancel')); ?>"
                        data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                        data-btn-cancel-icon-class="fas fa-ban mr-1"
                        data-title="<?php echo e(trans('icore::default.confirm')); ?>"
                        data-reasons="<?php echo e(json_encode(config('idir.dir.reasons'))); ?>" 
                        data-reasons-label="<?php echo e(trans('idir::dirs.reason.label')); ?>"
                        data-reasons-custom="<?php echo e(trans('idir::dirs.reason.custom')); ?>"                        
                    >
                        <i class="far fa-trash-alt"></i>
                        <span class="d-none d-sm-inline">
                            <?php echo e(trans('icore::default.delete')); ?>

                        </span>
                    </button>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.bans.create')): ?>
                    <button 
                        type="button" 
                        class="btn btn-dark create"
                        data-route="<?php echo e(route('admin.banmodel.dir.create', [$dir->id])); ?>"
                        data-toggle="modal" 
                        data-target="#createBanDirModal"
                    >
                        <i class="fas fa-user-slash"></i>
                        <span class="d-none d-sm-inline">
                            <?php echo e(trans('icore::default.ban')); ?>

                        </span>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($dir->isUrl() && !$dir->isNotOk()): ?>
            <div class="d-none d-sm-block mt-auto ml-auto mb-3">
                <?php echo $__env->yieldContent('thumbnail'); ?>
            </div>
            <?php endif; ?> 
        </div>      
    </div>     
</div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/dir/partials/dir.blade.php ENDPATH**/ ?>