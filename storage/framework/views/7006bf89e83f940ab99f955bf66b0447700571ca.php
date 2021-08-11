<?php $__env->startSection('logo'); ?>
<div id="navbarLogo" class="flex-grow-1 mr-2">
    <a href="/" class="navbar-brand" title="<?php echo e(config('app.name')); ?>" alt="<?php echo e(config('app.name_short')); ?>" title="<?php echo e(config('app.name_short')); ?>">
        <img src="https://cdn.alg.pl/katalog/logo/<?php echo e(config('app.name_short')); ?>-logo.svg" class="pb-3 logo logo-<?php echo e(config('app.name_short')); ?>" alt="<?php echo e(config('app.name_short')); ?>" title="<?php echo e(config('app.name')); ?>">
        <span class="domena-<?php echo e(config('app.name_short')); ?>"><?php echo e(config('app.name_short')); ?></span>
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar-toggler'); ?>
<a href="#" id="navbarToggle" class="my-auto navbar-toggler" role="button">
    <span class="navbar-toggler-icon"></span>
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search-toggler'); ?>
<a href="#" class="nav-link search-toggler" role="button">
	    <i class="fa fa-lg fa-search lupka-<?php echo e(config('app.name_short')); ?>"></i>
</a>
<?php $__env->stopSection(); ?>

<nav class="navbar bd-<?php echo e(config('app.name_short')); ?> menu navbar-expand-md navbar-light fixed-top border-bottom">
    <div class="container">
        
        <div class="d-flex flex-grow-1 navbar-search pr-3 pr-md-0">
            <?php echo $__env->yieldContent('logo'); ?>
            <form 
                id="searchForm" 
                method="GET" 
                action="<?php echo e(route('web.search.index')); ?>" 
                class="my-auto w-100 hide search"
            >
                <div class="input-group">
                    <input 
                        id="typeahead" 
                        data-route="<?php echo e(route('web.search.autocomplete')); ?>" 
                        type="text" 
                        name="search"
                        class="form-control border-right-0" 
                        placeholder="<?php echo e(trans('icore::search.search')); ?>"
                        value="<?php echo e($search ?? null); ?>"
                        autocomplete="off"
                    >

  
                    <input type="hidden" name="source" value="dir">
                    <span class="input-group-append">
                        <button 
                            class="btn btn-outline-secondary border border-left-0"
                            type="submit" <?php echo e(isset($search) ?: 'disabled'); ?>

                        >
                            <i class="fa fa-search lupka-<?php echo e(config('app.name_short')); ?>"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="my-auto">
                <ul class="navbar-nav">
                    <li class="nav-item d-sm-inline d-md-none ml-2">
                        <?php echo $__env->yieldContent('search-toggler'); ?>
                    </li>
                </ul>
            </div>
            <?php echo $__env->yieldContent('navbar-toggler'); ?>
        </div>



        <div class="navbar-collapse scroll collapse flex-grow-0 justify-content-end">
            <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('icore::page.menuComponent'), [
                'limit' => 0
            ])->toHtml(); ?>
            <ul class="navbar-nav pr-3 pr-md-0">

                <li class="nav-item d-none d-md-inline mr-1">
                    <?php echo $__env->yieldContent('search-toggler'); ?>
                </li>

                <?php if(app('router')->has('web.dir.create_1')): ?>
                <li class="nav-item mr-sm-0 mr-md-2 mb-2 mb-md-0">
                    <a 
                        class="btn btn-bd-download reg up 
						 
						

						
						"
                        href="<?php echo e(route('web.dir.create_1')); ?>" 
                        role="button"
                    ><i class="fas fa-fw fa-plus"></i>
                        <?php echo e(trans('idir::dirs.route.create.index')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown <?php echo e($isRouteContains('profile')); ?>">
                    <?php if(auth()->guard()->check()): ?>
                    <a 
                        class="btn btn-outline-light up reg" 
                        href="#" 
                        role="button" 
                        id="navbarDropdownMenuProfile"
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false"
                    >
                        <i class="fas fa-fw fa-lg fa-user-circle"></i>
                        <span class="d-md-none d-lg-inline"><?php echo e(auth()->user()->short_name); ?></span>
                    </a>
                    <div 
                        class="dropdown-menu dropdown-menu-right" 
                        aria-labelledby="navbarDropdownMenuProfile"
                    >
                        <h6 class="dropdown-header">
                            <?php echo e(trans('icore::auth.hello')); ?>, <?php echo e(auth()->user()->name); ?>

                        </h6>
                        <a 
                            class="dropdown-item <?php echo e($isUrl(route('web.profile.edit'))); ?>" 
                            href="<?php echo e(route('web.profile.edit')); ?>" 
                            title="<?php echo e(trans('icore::profile.route.edit')); ?>"
                        >
                            <?php echo e(trans('icore::profile.route.index')); ?>

                        </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.home.view')): ?>
                        <a 
                            class="dropdown-item" 
                            href="<?php echo e(route('admin.home.index')); ?>" 
                            title="<?php echo e(trans('icore::admin.route.index')); ?>"
                        >
                            <?php echo e(trans('icore::admin.route.index')); ?>

                        </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a 
                            class="dropdown-item" 
                            href="<?php echo e(route('logout')); ?>"
                            title="<?php echo e(trans('icore::auth.route.logout')); ?>"
                        >
                            <?php echo e(trans('icore::auth.route.logout')); ?>

                        </a>
                    </div>
                    <?php else: ?>
                    <a 
                        class="btn btn-outline-light up reg" 
                        href="<?php echo e(route('login')); ?>" 
                        role="button" 
                        title="<?php echo e(trans('icore::auth.route.login')); ?>"
                    ><i class="far fa-fw fa-lg fa-user-circle"></i>
                        <?php echo e(trans('icore::auth.route.login')); ?>

                    </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="menu-height"></div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/partials/nav.blade.php ENDPATH**/ ?>