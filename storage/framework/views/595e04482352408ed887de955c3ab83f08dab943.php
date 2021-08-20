<div class="d-flex flex-wrap" id="is-pagination">
    <div class="text-left mr-auto mt-3">
        <?php if($items->currentPage() < $items->lastPage()): ?>
        <?php if(($next ?? false) === true): ?>
        <a 
            href="<?php echo e($items->appends(request()->input())->nextPageUrl()); ?>" 
            rel="nofollow" 
            id="is-next" 
            role="button" 
            title="<?php echo e(trans('icore::pagination.next_page')); ?>"
            class="btn btn-outline-secondary text-nowrap"
        >
            <span><?php echo e(trans('icore::pagination.next_page')); ?></span>
            <i class="fas fa-angle-down"></i>
        </a>
        <?php else: ?>
        <a 
            href="<?php echo e(url()->full()); ?>" 
            rel="nofollow" 
            id="is-next" 
            role="button"
            class="btn btn-outline-secondary text-nowrap"
            title="<?php echo e(trans('icore::pagination.next_items', ['paginate' => ($filter['paginate'] ?? config('database.paginate'))])); ?>"
        >
            <span><?php echo e(trans('icore::pagination.next_items', ['paginate' => ($filter['paginate'] ?? config('database.paginate'))])); ?></span>
            <i class="fas fa-angle-down"></i>
        </a>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="pagination-sm ml-auto mt-3">
        <?php echo e($items->appends(request()->query())->links()); ?>

    </div>
</div>
<?php /**PATH /home/srv38307/domains/indexa.pl/vendor/n1ebieski/icore/src/Providers/../../resources/views/admin/partials/pagination.blade.php ENDPATH**/ ?>