<footer class="page-footer font-small mx-3 d-flex">
    <div class="footer-copyright text-right my-auto mr-3">
        <small>
            2003-<?php echo e(now()->year); ?> Copyright © <a href="https://alg.pl">ALG.PL 
            v3.<?php echo e(config('idir.version')); ?></a>
        </small>
    </div>
    <div 
        class="btn-group my-auto" 
        id="themeToggle" 
        role="group" 
        aria-label="<?php echo e(trans('icore::default.theme_toggle')); ?>"
    >
        <button 
            type="button" 
            class="btn btn-sm btn-light border" 
            style="width:80px;"
            <?php echo e($isTheme(['', null], 'disabled')); ?>

        >
            <?php echo e(trans('icore::default.light')); ?>

        </button>
        <button 
            type="button" 
            class="btn btn-sm btn-dark border" 
            style="width:80px;"
            <?php echo e($isTheme('dark', 'disabled')); ?>

        >
            <?php echo e(trans('icore::default.dark')); ?>

        </button>
    </div>
</footer>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/partials/footer.blade.php ENDPATH**/ ?>