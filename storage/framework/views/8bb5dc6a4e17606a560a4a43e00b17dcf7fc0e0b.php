<nav class="navbar menu navbar-expand navbar-light bg-light fixed-top border-bottom">
    <a 
        href="#" 
        class="navbar-toggler" 
        role="button" 
        id="sidebarToggle"
    >
        <span class="navbar-toggler-icon"></span>
    </a>
    <a href="/" class="navbar-brand">
        <img 
            src="https://cdn.alg.pl/katalog/logo/<?php echo e(config('app.name_short')); ?>-logo.svg" 
            class="pb-1 pr-1 logo" 
            alt="<?php echo e(config('app.name_short')); ?>" 
            title="<?php echo e(config('app.name')); ?>"
        >
        <span><?php echo e(config('app.name_short')); ?></span>
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a 
                class="nav-link text-nowrap" 
                href="#" 
                role="button" 
                id="navbarDropdownMenuLink"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-lg fa-users-cog"></i>
                <span class="d-none d-sm-inline"><?php echo e(auth()->user()->short_name); ?></span>
            </a>
            <div 
                class="dropdown-menu dropdown-menu-right" 
                aria-labelledby="navbarDropdownMenuLink"
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
        </li>
    </ul>
</nav>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/partials/nav.blade.php ENDPATH**/ ?>