<form 
    id="createComment" 
    class="position-relative"
    data-route="<?php echo e(route("web.comment.{$model->poli_self}.store", [$model->id])); ?>" 
    method="post"
>
    <input 
        type="hidden" 
        id="parent_id" 
        name="parent_id" 
        value="<?php echo e($parent_id); ?>"
    >
    <div class="form-group">
        <textarea 
            class="form-control" 
            rows="3" 
            id="content" 
            name="content"
        ></textarea>
    </div>
    <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('icore::captchaComponent'), ['id' => $parent_id])->toHtml(); ?>
    <button type="button" class="btn btn-primary storeComment">
        <?php echo e(trans('icore::default.submit')); ?>

    </button>
</form>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/comment/create.blade.php ENDPATH**/ ?>