<footer class="page-footer border-top font-small pt-4 mt50">
    <div class="container text-center text-md-left">
        <div class="row ">
            <div class="col-md mx-auto">
                <h5 class="mt-3 mb-4">
                    <?php echo e(config('app.name')); ?>

                </h5>
                <p><?php echo e(config('app.desc')); ?></p>
            </div>
            <?php if(app('router')->has('web.newsletter.store')): ?>
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md mx-auto">
                <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('icore::newsletterComponent'), [])->toHtml(); ?>
            </div>
            <?php endif; ?>
            <hr class="clearfix w-100 d-md-none">
        </div>
        <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
        <div class="col-md-auto text-center">
            <!--linki -->
			<a href="<?php echo e(route('web.dir.index')); ?>" class="<?php echo e($isUrl(route('web.dir.index'), 'font-weight-bold')); ?>" title="<?php echo e(trans('idir::dirs.route.index')); ?> <?php echo e(config('app.name')); ?>">Katalog <?php echo e(config('app.name_short')); ?></a> |
			<a href="<?php echo e(route('web.friend.index')); ?>" title="<?php echo e(trans('icore::friends.route.index')); ?>" class="<?php echo e($isUrl(route('web.friend.index'), 'font-weight-bold')); ?>"><?php echo e(trans('icore::friends.route.index')); ?></a> |
			<a href="/info/regulamin" rel="nofollow">Regulamin</a> |
			<a href="https://alg.pl/polityka" target="_blank" rel="nofollow">Polityka Prywatności</a> |
			<a href="https://alg.pl/mk" target="_blank" rel="nofollow">Multikody</a> |
            <a href="<?php echo e(route('web.contact.show')); ?>" title="<?php echo e(trans('icore::contact.route.show')); ?>" class="<?php echo e($isUrl(route('web.contact.show'), 'font-weight-bold')); ?>">
                <?php echo e(trans('icore::contact.route.show')); ?>

            </a> |
            <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
            <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::linkComponent'), ['limit' => 5, 'cats' => $catsAsArray ?? null])->toHtml(); ?>
            <!--linkiKoniec-->
        </div>
        <hr class="hr-<?php echo e($dir->group->border ?? null); ?>">
        <div class="d-flex justify-content-center">
            <div class="footer-copyright text-center py-3 mr-3">
                <small>
                    2005 - <?php echo e(now()->year); ?> Copyright © <a href="https://alg.pl" target="_blank" rel="nofollow">ALG.PL</a> v 3.<?php echo e(config('idir.version')); ?>2307 dla <a href="https://<?php echo e(config('app.name_short')); ?>"><?php echo e(config('app.name_short')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fas fa-users text-danger"></i><span> <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::statComponentOnline'), [])->toHtml(); ?></span>
                </small>
                <br />
              <small><a href="https://wioskisos.org/" target="_blank" rel="nofollow"><img src="https://cdn.alg.pl/katalog/pic/wioskisos.png" alt="" width="260" height="70" /></a> 
			  </small>
            </div>
        </div>
</footer>

<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/partials/footer.blade.php ENDPATH**/ ?>