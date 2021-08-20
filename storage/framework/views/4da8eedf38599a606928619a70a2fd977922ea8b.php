<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item ">
    <a href="<?php echo e(route('web.dir.index')); ?>" title="<?php echo e(trans('idir::dirs.route.index')); ?>">
        <?php echo e(trans('idir::dirs.route.index')); ?>

    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e($dir->title); ?>

</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!----wpis <?php echo e($dir->group->border ?? null); ?> <?php echo e($dir->id); ?> ----->
<div class="body-<?php echo e($dir->group->border ?? null); ?> wpis-<?php echo e($dir->id); ?> ">
    <div class="p3rem container">
        <div class="row">
            <div class="col pl-lg-0 order-2">
                <div class="rounded text-<?php echo e($dir->group->border ?? null); ?> tlo-<?php echo e($dir->group->border ?? null); ?>">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <h1 class="h4 tytul-<?php echo e($dir->group->border ?? null); ?>">
                                <?php echo e($dir->title); ?>

                            </h1>
                        </div>
                    </div>
                    <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
                    <div class="text-justify">
                        <?php echo $dir->content_as_html; ?>

                    </div>
                    <div class="d-flex">
                        <div class="ml-auto">
                            <?php if($dir->url !== null): ?>
                            <div class="text-primary"><i class="fab fa-internet-explorer"></i>&nbsp;<?php echo $dir->url_as_link; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
                    <div class="d-flex">
                        <ul class="list-inline text-sm mb-0 stats">
                            <li class="list-inline-item mr-3"><i class="far fa-clock  mr-1"></i><?php echo e(trans('icore::default.created_at_diff')); ?>: <?php echo e($dir->created_at_diff); ?>

                            </li>
                            <?php if($dir->relationLoaded('stats')): ?>
                            <?php $__currentLoopData = $dir->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item mr-3">
                                <i class="fa fa-signal mr-1 "></i>
                                <?php echo e(trans("icore::stats.{$stat->slug}")); ?>: <b><?php echo e($stat->pivot->value); ?></b>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($statCtr > 0): ?>
                            <li class="list-inline-item mr-3"><i class="fa fa-percent mr-1"></i>&nbsp;<?php echo e($statCtr); ?></li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <li class="list-inline-item mr-3"><i class="far fa-address-card"></i> <?php echo e($dir->id); ?></li>
                            <li class="list-inline-item mr-3">
                                <input id="star-rating" name="star-rating" data-route="<?php echo e(route('web.rating.dir.rate', [$dir->id])); ?>" value="<?php echo e($dir->sum_rating); ?>" data-stars="5" data-step="1" data-size="xs" data-container-class="float-left ml-auto" <?php if(auth()->guard()->check()): ?> data-user-value="<?php echo e($ratingUserValue); ?>" data-show-clear="<?php echo e($ratingUserValue ? true : false); ?>" <?php else: ?> data-display-only="true" <?php endif; ?> class="rating-loading" data-language="<?php echo e(config('app.locale')); ?>"><b><?php echo e($dir->sum_rating); ?></b>
                            </li>
                        </ul>
                    </div>
                    <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
                    <?php if($dir->categories->isNotEmpty()): ?>
                    <ul class="kattt amenities-list list-inline text-<?php echo e($dir->group->border ?? null); ?>">
                        <li class="list-inline-item mb-2">
                            <h4 class="h6 mb-4 mb-4 "><i class="far fa-folder"></i> &nbsp;<?php echo e(trans('icore::categories.categories.label')); ?>:&nbsp;</h4>
                        </li>
                        <?php $__currentLoopData = $dir->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-inline-item mb-2">
                            <span class="p-3 text-muted font-weight-normal">
                                <i class="far fa-folder-open"></i> <a href="<?php echo e(route('web.category.dir.show', [$category->slug])); ?>" title="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></a><?php echo e((!$loop->last) ? ' ' : ''); ?>

                            </span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <?php if($dir->tags->isNotEmpty()): ?>
                    <li class="list-inline-item mb-2">
                        <h4 class="h6 mb-4 mb-4 "><i class="fa fa-hashtag"></i>&nbsp;<?php echo e(trans('idir::dirs.tags.label')); ?>:&nbsp;</h4>
                    </li>
                    <?php $__currentLoopData = $dir->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-inline-item mb-2">
                        <span class="p-3 text-muted font-weight-normal badge badge-light badge-pill">
                            <a href=" <?php echo e(route('web.tag.dir.show', [$tag->normalized])); ?>" title="<?php echo e($tag->name); ?>">
                                <?php echo e($tag->name); ?>

                            </a><?php echo e((!$loop->last) ? ' ' : ''); ?>

                        </span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <!--mapa-->
                    <div class="text-block">
                        <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::map.dir.mapComponent'), [
                        'dir' => $dir
                        ])->toHtml(); ?>
                    </div>
                    <!--koniec mapa-->
                </div>
                <!-----komentarze----->
                <div class="rounded text-<?php echo e($dir->group->border ?? null); ?> tlo-<?php echo e($dir->group->border ?? null); ?>">
                    <h4 class="h5 mb-4 mb-4" id="comments"><i class="far fa-comments"></i>&nbsp;<?php echo e(trans('icore::comments.comments')); ?> </h4>
                    <div id="filterContent">
                        <?php if($comments->isNotEmpty()): ?>
                        <?php echo $__env->make('icore::web.comment.partials.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <div id="comment">
                            <?php if(auth()->guard()->check()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['web.comments.create', 'web.comments.suggest'])): ?>
                            <?php echo $__env->make('icore::web.comment.create', [
                            'model' => $dir,
                            'parent_id' => 0
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" title="<?php echo e(trans('icore::comments.log_to_comment')); ?>">
                                <?php echo e(trans('icore::comments.log_to_comment')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                        <?php if($comments->isNotEmpty()): ?>
                        <div id="infinite-scroll">
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('icore::web.comment.partials.comment', [
                            'comment' => $comment
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('icore::web.partials.pagination', [
                            'items' => $comments,
                            'fragment' => 'comments'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!--Koniec komentarze--->
                <!--podobne--->
                <?php if($related->isNotEmpty()): ?>
                <div class="podobne rounded">
                    <h4 class="h5 mb-4 mb-4"><i class="fa fa-anchor"></i>&nbsp;<?php echo e(trans('idir::dirs.related')); ?></h4>
                    <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled text-muted">
                                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mb-2">
                                    <span class="text-sm"><a href="<?php echo e(route('web.dir.show', [$rel->slug])); ?>" title="<?php echo e($rel->title); ?>">
                                            <i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                                            <?php echo e($rel->title); ?>

                                        </a></span>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!--koniec podobne--->
            </div>
            <div class="col-12 col-lg-4 text-md-left text-center order-1 ">
                <?php if($dir->url !== null): ?>
                <div class="carousel mb2rem border5">
                    <a href="<?php echo e($dir->url); ?>" class="item bg-image rounded " style="background-image: url('<?php echo e($dir->thumbnail_url); ?>');" title="<?php echo e($dir->title); ?>" target="_blank"></a>
                    <div class="kontener-<?php echo e($dir->group->border ?? null); ?>">
                        <div class="grupa-<?php echo e($dir->group->border ?? null); ?> outline-<?php echo e($dir->group->border ?? null); ?>"></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($dir->group->fields->isNotEmpty()): ?>
                <?php $__currentLoopData = $dir->group->fields->where('type', '!=', 'map'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value = optional($dir->fields->where('id', $field->id)->first())->decode_value): ?>

                <div class="rounded text-<?php echo e($dir->group->border ?? null); ?> tlo-<?php echo e($dir->group->border ?? null); ?>">
                    <div class="list-group list-group-flush mb-3">
                        <div class="list-group-item wpis-list">
                            <div class="float-left mr-2">
                                <?php echo e($field->title); ?>:
                            </div>
                            <div class="float-right bold">
                                <?php switch($field->type):
                                case ('input'): ?>
                                <?php case ('textarea'): ?>
                                <?php case ('select'): ?>
                                <?php echo e($value); ?>

                                <?php break; ?>;
                                <?php case ('multiselect'): ?>
                                <?php case ('checkbox'): ?>
                                <?php echo e(implode(', ', $value)); ?>

                                <?php break; ?>;
                                <?php case ('regions'): ?>
                                <?php echo e(implode(', ', $dir->regions->pluck('name')->toArray())); ?>

                                <?php break; ?>;
                                <?php case ('image'): ?>
                                <img class="img-fluid" src="<?php echo e(app('filesystem')->url($value)); ?>">
                                <?php break; ?>;
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="rounded">
                    <div class="list-group list-group-flush mb-3 padd15 p5">
                        <div class="list-group-item wpis-list">
                            <a class="btn btn-outline-primary btn-block shadow" href="#" data-toggle="modal" data-target="#linkModal" title="<?php echo e(trans('idir::dirs.link_dir_page')); ?>">
                                <span class="span-wpis"><?php echo e(trans('idir::dirs.link_dir_page')); ?></span>
                            </a>
                        </div>
                        <?php if(isset($dir->user->email) && app('router')->has('web.contact.dir.show')): ?>
                        <div class="list-group-item wpis-list">
                            <?php if(auth()->guard()->check()): ?>
                            <a class="showContact btn btn-outline-info btn-block" href="#" data-route="<?php echo e(route('web.contact.dir.show', [$dir->id])); ?>" title="<?php echo e(trans('idir::contact.dir.route.show')); ?>" data-toggle="modal" data-target="#contactModal">
                                <span class="span-wpis"><?php echo e(trans('idir::contact.dir.route.show')); ?></span>
                            </a>
                            <?php else: ?>
                            <a class="btn btn-outline-info btn-block" href="<?php echo e(route('login')); ?>" title="<?php echo e(trans('idir::contact.dir.log_to_contact')); ?>">
                                <span class="span-wpis"> <?php echo e(trans('idir::contact.dir.log_to_contact')); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="list-group-item wpis-list">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('web.dirs.edit')): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $dir)): ?>
                            <a class="btn btn-danger btn-block" href="<?php echo e(route('web.dir.edit_1', [$dir->id])); ?>" title="<?php echo e(trans('idir::dirs.premium_dir')); ?>">
                                <span class="span-wpis"><?php echo e(trans('idir::dirs.premium_dir')); ?></span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="list-group-item wpis-list">
                            <?php if(auth()->guard()->check()): ?>
                            <a href="#" data-route="<?php echo e(route('web.report.dir.create', [$dir->id])); ?>" title="<?php echo e(trans('icore::reports.route.create')); ?>" data-toggle="modal" data-target="#createReportModal" class="createReport btn btn-outline-danger btn-block">
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                                <span><?php echo e(trans('icore::reports.route.create')); ?></span>
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" title="<?php echo e(trans('icore::reports.log_to_report')); ?>" class="btn btn-outline-danger btn-block">
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                                <span> <?php echo e(trans('icore::reports.log_to_report')); ?></span>
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---postatni-->
</div>
<!---ostatni-->
<?php $__env->startComponent('icore::web.partials.modal'); ?>
<?php $__env->slot('modal_id', 'linkModal'); ?>
<?php $__env->slot('modal_title'); ?>
<i class="fas fa-link"></i>
<span> <?php echo e(trans('idir::dirs.link_dir_page')); ?></span>
<?php $__env->endSlot(); ?>
<?php $__env->slot('modal_body'); ?>
<div class="form-group">
    <textarea class="form-control" name="dir" rows="5" readonly><?php echo e($dir->link_as_html); ?></textarea>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php if(auth()->guard()->check()): ?>
<?php $__env->startComponent('icore::web.partials.modal'); ?>
<?php $__env->slot('modal_id', 'createReportModal'); ?>
<?php $__env->slot('modal_title'); ?>
<i class="fas fa-exclamation-triangle"></i>
<span> <?php echo e(trans('icore::reports.route.create')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('icore::web.partials.modal'); ?>
<?php $__env->slot('modal_id', 'contactModal'); ?>
<?php $__env->slot('modal_size', 'modal-lg'); ?>
<?php $__env->slot('modal_title'); ?>
<i class="fas fa-paper-plane"></i>
<span> <?php echo e(trans('idir::contact.dir.route.show')); ?></span>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php
app(\N1ebieski\ICore\View\Components\CaptchaComponent::class)->toHtml()->render();
?>

<?php echo $__env->make(config('idir.layout') . '::web.layouts.layout', [
'title' => [
$dir->title,
$comments->currentPage() > 1 ?
trans('icore::pagination.page', ['num' => $comments->currentPage()])
: null
],
'desc' => [$dir->short_content],
'keys' => [$dir->tagList],
'og' => [
'title' => $dir->title,
'desc' => $dir->short_content,
'image' => $dir->url !== null ? $dir->thumbnail_url : null
]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/show.blade.php ENDPATH**/ ?>