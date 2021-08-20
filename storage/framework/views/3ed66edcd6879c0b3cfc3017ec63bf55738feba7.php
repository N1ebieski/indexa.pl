<form data-route="<?php echo e(route("admin.dir.index")); ?>" id="filter">
    <div class="d-flex flex-wrap position-relative">
        <div class="mb-3 mr-auto">
            <span class="badge badge-primary">
                <?php echo e(trans('icore::filter.items')); ?>: <?php echo e($dirs->total()); ?>

            </span>
            <?php if($filter['search'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[search]"
                >
                    <span><?php echo e(trans('icore::filter.search.label')); ?>: <?php echo e($filter['search']); ?></span>
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>
            <?php if($filter['status'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[status]"
                >
                    <span><?php echo e(trans('icore::filter.status.label')); ?>: <?php echo e(trans("idir::dirs.status.{$filter['status']}")); ?></span>
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>
            <?php if($filter['report'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[report]"
                >
                    <span><?php echo e(trans('icore::filter.report.label')); ?>: <?php echo e(trans('icore::filter.report.'.$filter['report'])); ?></span>
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>        
            <?php if($filter['group'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[group]"
                >
                    <span><?php echo e(trans('idir::filter.group')); ?>: <?php echo e($filter['group']->name); ?></span>
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>
            <?php if($filter['category'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[category]"
                >
                    <span><?php echo e(trans('icore::filter.category')); ?>: <?php echo e($filter['category']->name); ?></span>
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>
            <?php if($filter['author'] !== null): ?>
            <span>
                <a 
                    href="#" 
                    class="badge badge-primary filterOption" 
                    data-name="filter[author]"
                >
                    <span><?php echo e(trans('icore::filter.author')); ?>: <?php echo e($filter['author']->name); ?></span>
                    <input type="hidden" name="filter[author]" value="<?php echo e($filter['author']->id); ?>">
                    <span aria-hidden="true">&times;</span>
                </a>
            </span>
            <?php endif; ?>
            <?php if(array_filter($filter)): ?>
            <span>
                <a 
                    href="<?php echo e(route("admin.dir.index")); ?>" 
                    class="badge badge-dark"
                >
                    <?php echo e(trans('icore::default.clear')); ?>

                </a>
            </span>
            <?php endif; ?>
        </div>
        <div class="ml-sm-auto">
            <div class="form-inline d-flex flex-nowrap">
                <div class="form-group col-xs-4">
                    <button 
                        class="btn border mr-2" 
                        href="#" 
                        type="button" 
                        data-toggle="modal"
                        data-target="#filterModal"
                    >
                        <i class="fas fa-sort-amount-up"></i>
                    </button>
                </div>
                <div class="form-group col-xs-4 mr-2">
                    <label class="sr-only" for="filterOrderBy">
                        <?php echo e(trans('icore::filter.order')); ?>

                    </label>
                    <select 
                        class="form-control custom-select filter" 
                        name="filter[orderby]" 
                        id="filterOrderBy"
                    >
                        <option value="">
                            <?php echo e(trans('icore::filter.order')); ?> <?php echo e(trans('icore::filter.default')); ?>

                        </option>
                        <option 
                            value="created_at|desc"
                            <?php echo e(($filter['orderby'] == 'created_at|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.created_at'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="created_at|asc"
                            <?php echo e(($filter['orderby'] == 'created_at|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.created_at'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                        <option 
                            value="updated_at|desc"
                            <?php echo e(($filter['orderby'] == 'updated_at|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.updated_at'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="updated_at|asc"
                            <?php echo e(($filter['orderby'] == 'updated_at|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.updated_at'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                        <option 
                            value="title|desc"
                            <?php echo e(($filter['orderby'] == 'title|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.title'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="title|asc"
                            <?php echo e(($filter['orderby'] == 'title|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.title'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                        <option 
                            value="sum_rating|desc"
                            <?php echo e(($filter['orderby'] == 'sum_rating|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.sum_rating'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="sum_rating|asc"
                            <?php echo e(($filter['orderby'] == 'sum_rating|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.sum_rating'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                        <option 
                            value="click|desc"
                            <?php echo e(($filter['orderby'] == 'click|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.clicks'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="click|asc"
                            <?php echo e(($filter['orderby'] == 'click|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.clicks'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                        <option 
                            value="view|desc"
                            <?php echo e(($filter['orderby'] == 'view|desc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.views'))); ?> <?php echo e(trans('icore::filter.desc')); ?>

                        </option>
                        <option 
                            value="view|asc"
                            <?php echo e(($filter['orderby'] == 'view|asc') ? 'selected' : ''); ?>

                        >
                            <?php echo e(mb_strtolower(trans('icore::filter.views'))); ?> <?php echo e(trans('icore::filter.asc')); ?>

                        </option>
                    </select>
                </div>
                <div class="form-group col-xs-4">
                    <label class="sr-only" for="filterPaginate">
                        <?php echo e(trans('icore::filter.paginate')); ?>

                    </label>
                    <select 
                        class="form-control custom-select filter" 
                        name="filter[paginate]" 
                        id="filterPaginate"
                    >
                        <option 
                            value="<?php echo e($paginate = config('database.paginate')); ?>" 
                            <?php echo e(($filter['paginate'] == $paginate) ? 'selected' : ''); ?>

                        >
                            <?php echo e($paginate); ?>

                        </option>
                        <option 
                            value="<?php echo e(($paginate*2)); ?>" 
                            <?php echo e(($filter['paginate'] == ($paginate*2)) ? 'selected' : ''); ?>

                        >
                            <?php echo e(($paginate*2)); ?>

                        </option>
                        <option 
                            value="<?php echo e(($paginate*4)); ?>" 
                            <?php echo e(($filter['paginate'] == ($paginate*4)) ? 'selected' : ''); ?>

                        >
                            <?php echo e(($paginate*4)); ?>

                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('idir::admin.dir.partials.filter_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/dir/partials/filter.blade.php ENDPATH**/ ?>