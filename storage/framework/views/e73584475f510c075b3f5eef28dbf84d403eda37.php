<div 
    class="modal fade" 
    id="<?php echo e($modal_id); ?>" 
    tabindex="-1" 
    role="dialog"
    aria-labelledby="<?php echo e($modal_id); ?>Title" 
    aria-hidden="true" 
    data-focus="false"
>
    <div 
        class="modal-dialog modal-dialog-centered <?php echo e($modal_size ?? null); ?>" 
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="<?php echo e($modal_id); ?>Title">
                    <?php echo e($modal_title); ?>

                </h5>
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo e($modal_body ?? null); ?>

            </div>
            <div class="modal-footer">
                <?php echo e($modal_footer ?? null); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/partials/modal.blade.php ENDPATH**/ ?>