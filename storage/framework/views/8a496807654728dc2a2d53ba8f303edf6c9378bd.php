<form data-route="<?php echo e(url()->current()); ?>" id="filter">
    <?php if(isset($search)): ?>
    <input type="hidden" value="<?php echo e($search); ?>" name="search">
    <?php endif; ?>    
    <div class="d-flex position-relative">
        <div class="form-group ml-auto">
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
                    <?php echo e(mb_strtolower(trans('icore::filter.created_at'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="created_at|asc"
                    <?php echo e(($filter['orderby'] == 'created_at|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.created_at'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>
                <option 
                    value="updated_at|desc"
                    <?php echo e(($filter['orderby'] == 'updated_at|desc') ? 'selected' : ''); ?>>
                    <?php echo e(mb_strtolower(trans('icore::filter.updated_at'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="updated_at|asc"
                    <?php echo e(($filter['orderby'] == 'updated_at|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.updated_at'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>
                <option 
                    value="title|desc"
                    <?php echo e(($filter['orderby'] == 'title|desc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.title'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="title|asc"
                    <?php echo e(($filter['orderby'] == 'title|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.title'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>
                <option 
                    value="sum_rating|desc"
                    <?php echo e(($filter['orderby'] == 'sum_rating|desc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.sum_rating'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="sum_rating|asc"
                    <?php echo e(($filter['orderby'] == 'sum_rating|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.sum_rating'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>
                <option 
                    value="click|desc"
                    <?php echo e(($filter['orderby'] == 'click|desc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.clicks'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="click|asc"
                    <?php echo e(($filter['orderby'] == 'click|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.clicks'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>
                <option
                    value="view|desc"
                    <?php echo e(($filter['orderby'] == 'view|desc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.views'))); ?>

                    <?php echo e(trans('icore::filter.desc')); ?>

                </option>
                <option 
                    value="view|asc"
                    <?php echo e(($filter['orderby'] == 'view|asc') ? 'selected' : ''); ?>

                >
                    <?php echo e(mb_strtolower(trans('icore::filter.views'))); ?>

                    <?php echo e(trans('icore::filter.asc')); ?>

                </option>                    
            </select>
        </div>
    </div>
</form>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/partials/filter.blade.php ENDPATH**/ ?>