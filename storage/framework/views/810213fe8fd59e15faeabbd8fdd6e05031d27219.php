<!--dir.blade.php--->
<!------Wpis <?php echo e($dir->group->border ?? null); ?>---->
<div class="mb-4 ramka-<?php echo e($dir->group->border ?? null); ?> shadow-sm rounded">

    <div class="row">
        <div class="col-sm-4 text-center order-1">
            <?php if($dir->url !== null): ?>
            <div>
			<a href="<?php echo $dir->slug; ?>"><img src="<?php echo e($dir->thumbnail_url); ?>" class="img-fluid border5 mx-auto d-block" alt="<?php echo e($dir->title); ?>"></a>
                    <div class="kontener-dir-<?php echo e($dir->group->border ?? null); ?>">
                        <div class="grupa-dir-<?php echo e($dir->group->border ?? null); ?> outline-dir-<?php echo e($dir->group->border ?? null); ?>"></div>
                    </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-sm-8 pl-sm-0 mt-2 mt-sm-0 order-2 ">
		    <h2 class="h6 tytuldir">
        <?php echo $dir->link; ?>

    </h2>
            <div class="d-flex mb-2 datadir border-<?php echo e($dir->group->border ?? null); ?>">
                <small class="mr-auto">
                   <i class="far fa-clock"></i> <?php echo e(trans('icore::default.created_at_diff')); ?>: <?php echo e($dir->created_at_diff); ?>

                </small>
                <small class="ml-auto">
                    <input id="star-rating<?php echo e($dir->id); ?>" name="star-rating<?php echo e($dir->id); ?>" value="<?php echo e($dir->sum_rating); ?>" data-stars="5" data-display-only="true" data-size="xs" class="rating-loading" data-language="<?php echo e(config('app.locale')); ?>">
                </small>
            </div>

            <div class="text-break" style="word-break:break-word">
                <p class="text-justify contentlink opis"><?php echo e($dir->short_content); ?>...</p>
<div class="row"><div class="col-auto mr-auto"></div><div class="col-auto"><a class="r-link rr-link text-underlined clink-<?php echo e($dir->group->border ?? null); ?>" href="<?php echo e(route('web.dir.show', [$dir->slug])); ?>"><?php echo e(trans('idir::dirs.more')); ?></a></div></div>
               
            </div>


        </div>
    </div>


</div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/partials/dir.blade.php ENDPATH**/ ?>