<div class="sidebar position scroll <?php echo e($isCookie('sidebarToggle', 'toggled')); ?>">
    <ul 
        class="sidebar bg-light navbar-light position-fixed scroll navbar-nav border-right <?php echo e($isCookie('sidebarToggle', 'toggled')); ?>"
    >
        <li class="nav-item navbar-light fake-toggler">
            <a 
                href="#" 
                class="navbar-toggler" 
                role="button" 
                id="sidebarToggle"
            >
                <span class="navbar-toggler-icon"></span>
            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.home.view')): ?>
        <li class="nav-item <?php echo e($isUrl(route('admin.home.index'))); ?>">
            <a 
                class="nav-link" 
                href="<?php echo e(route('admin.home.index')); ?>" 
                title="Dashboard"
            >
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pages.view')): ?>
        <li class="nav-item <?php echo e($isUrlContains(['*/pages', '*/pages/*'])); ?>">
            <a 
                class="nav-link" 
                href="<?php echo e(route('admin.page.index')); ?>"
                title="<?php echo e(trans('icore::pages.route.index')); ?>"
            >
                <i class="fas fa-fw fa-file-word"></i>
                <span><?php echo e(trans('icore::pages.route.index')); ?></span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.posts.view')): ?>
        <li class="nav-item <?php echo e($isUrlContains(['*/posts', '*/posts/*'])); ?>">
            <a 
                class="nav-link" 
                href="<?php echo e(route('admin.post.index')); ?>"
                title="<?php echo e(trans('icore::posts.route.index')); ?>"
            >
                <i class="fas fa-fw fa-blog"></i>
                <span><?php echo e(trans('icore::posts.route.index')); ?></span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['admin.dirs.view', 'admin.bans.view'])): ?>
        <li 
            class="nav-item dropdown <?php echo e($isUrlContains(['*/dirs', '*/dirs/*'])); ?>

            <?php echo e($isUrl(route('admin.banvalue.index', ['type' => 'url']))); ?>"
        >
            <div 
                class="nav-link dropdown-toggle"
                id="dirDropdown" 
                role="button" 
                style="cursor: pointer;"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="far fa-fw fa-folder-open"></i>
                <span><?php echo e(trans('idir::dirs.route.index')); ?></span>
                <?php if($dirs_inactive_count > 0): ?>
                <span class="badge badge-warning"> <?php echo e($dirs_inactive_count); ?></span>
                <?php endif; ?>
                <?php if($dirs_reported_count > 0): ?>
                <span class="badge badge-danger"> <?php echo e($dirs_reported_count); ?></span>
                <?php endif; ?>
            </div>
            <div class="dropdown-menu" aria-labelledby="dirDropdown">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.dirs.view')): ?>
                <div 
                    class="dropdown-item <?php echo e($isUrlContains(['*/dirs', '*/dirs/*'])); ?>"
                    onclick="window.location.href='<?php echo e(route('admin.dir.index')); ?>'"
                    style="cursor: pointer;"
                >
                    <span><?php echo e(trans('idir::dirs.route.index')); ?></span>
                    <?php if($dirs_inactive_count > 0): ?>
                    <span>
                        <a 
                            href="<?php echo e(route('admin.dir.index', ['filter[status]' => 0])); ?>"
                            class="badge badge-warning"
                        >
                            <?php echo e($dirs_inactive_count); ?>

                        </a>
                    </span>
                    <?php endif; ?>
                    <?php if($dirs_reported_count > 0): ?>
                    <span>
                        <a 
                            href="<?php echo e(route('admin.dir.index', ['filter[report]' => 1])); ?>"
                            class="badge badge-danger"
                        >
                            <?php echo e($dirs_reported_count); ?>

                        </a>
                    </span>
                    <?php endif; ?>                    
                </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.bans.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.banvalue.index', ['type' => 'url']))); ?>"
                    href="<?php echo e(route('admin.banvalue.index', ['type' => 'url'])); ?>"
                    title="<?php echo e(trans('idir::bans.value.url.route.index')); ?>"
                >
                    <?php echo e(trans('idir::bans.value.url.route.index')); ?>

                </a>
                <?php endif; ?>
            </div>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.comments.view')): ?>
        <li class="nav-item dropdown <?php echo e($isUrl([
            route('admin.comment.post.index'),
            route('admin.comment.page.index'),
            route('admin.comment.dir.index')
        ])); ?>">
            <a 
                class="nav-link dropdown-toggle"
                href="#" 
                id="commentDropdown" 
                role="button"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-fw fa-comments"></i>
                <span> <?php echo e(trans('icore::comments.route.index')); ?> </span>
                <?php if($count = $comments_inactive_count->sum('count')): ?>
                <span class="badge badge-warning"><?php echo e($count); ?></span>
                <?php endif; ?>
                <?php if($count = $comments_reported_count->sum('count')): ?>
                <span class="badge badge-danger"><?php echo e($comments_reported_count->sum('count')); ?></span>
                <?php endif; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="commentDropdown">
                <h6 class="dropdown-header">
                    <?php echo e(trans('icore::default.type')); ?>:
                </h6>
                <?php $__currentLoopData = ['post', 'page', 'dir']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div 
                    class="dropdown-item <?php echo e($isUrl(route("admin.comment.{$type}.index"))); ?>"
                    onclick="window.location.href='<?php echo e(route("admin.comment.{$type}.index")); ?>'"
                    style="cursor: pointer;"
                >
                    <span><?php echo e(trans("icore::comments.{$type}.{$type}")); ?></span>
                    <?php if($count = $comments_inactive_count->where('model', $type)->first()): ?>
                    <span>
                        <a 
                            href="<?php echo e(route("admin.comment.{$type}.index", ['filter[status]' => 0])); ?>"
                            class="badge badge-warning"
                        >
                            <?php echo e($count->count); ?>

                        </a>
                    </span>
                    <?php endif; ?>
                    <?php if($count = $comments_reported_count->where('model', $type)->first()): ?>
                    <span>
                        <a 
                            href="<?php echo e(route("admin.comment.{$type}.index", ['filter[report]' => 1])); ?>"
                            class="badge badge-danger"
                        >
                            <?php echo e($count->count); ?>

                        </a>
                    </span>
                    <?php endif; ?>                    
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.categories.view')): ?>
        <li 
            class="nav-item dropdown <?php echo e($isUrl([
                route('admin.category.post.index'),
                route('admin.category.dir.index')
            ])); ?>"
        >
            <a 
                class="nav-link dropdown-toggle"
                href="#" 
                id="pagesDropdown" 
                role="button"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-fw fa-layer-group"></i>
                <span><?php echo e(trans('icore::categories.route.index')); ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">
                    <?php echo e(trans('icore::default.type')); ?>:
                </h6>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.category.post.index'))); ?>"
                    href="<?php echo e(route('admin.category.post.index')); ?>"
                    title="<?php echo e(trans('icore::categories.post.post')); ?>"
                >
                    <?php echo e(trans('icore::categories.post.post')); ?>

                </a>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.category.dir.index'))); ?>"
                    href="<?php echo e(route('admin.category.dir.index')); ?>"
                    title="<?php echo e(trans('idir::categories.dir.dir')); ?>"
                >
                    <?php echo e(trans('idir::categories.dir.dir')); ?>

                </a>
            </div>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['admin.groups.view', 'admin.fields.view'])): ?>
        <li class="nav-item dropdown <?php echo e($isUrlContains([
            '*/groups',
            '*/groups/*',
            '*/prices',
            '*/prices/*',            
            '*/fields/group',
            '*/fields/group/*',           
        ])); ?>">
            <a 
                class="nav-link dropdown-toggle"
                href="#" 
                id="groupDropdown" 
                role="button"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-fw fa-object-group"></i>
                <span><?php echo e(trans('idir::groups.route.index')); ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="groupDropdown">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.groups.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrlContains(['*/groups', '*/groups/*'])); ?>"
                    href="<?php echo e(route('admin.group.index')); ?>"
                    title="<?php echo e(trans('idir::groups.route.index')); ?>"
                >
                    <?php echo e(trans('idir::groups.route.index')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.prices.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrlContains(['*/prices', '*/prices/*'])); ?>"
                    href="<?php echo e(route('admin.price.index')); ?>"
                    title="<?php echo e(trans('idir::prices.route.index')); ?>"
                >
                    <?php echo e(trans('idir::prices.route.index')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.fields.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.field.group.index'))); ?>"
                    href="<?php echo e(route('admin.field.group.index')); ?>"
                    title="<?php echo e(trans('idir::fields.route.index')); ?>"
                >
                    <?php echo e(trans('idir::fields.route.index')); ?>

                </a>
                <?php endif; ?>
            </div>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.mailings.view')): ?>
        <li class="nav-item <?php echo e($isUrlContains(['*/mailings', '*/mailings/*'])); ?>">
            <a 
                class="nav-link" 
                href="<?php echo e(route('admin.mailing.index')); ?>"
                title="<?php echo e(trans('icore::mailings.route.index')); ?>"
            >
                <i class="fas fa-fw fa-envelope"></i>
                <span><?php echo e(trans('icore::mailings.route.index')); ?></span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['admin.users.view', 'admin.bans.view', 'admin.roles.view'])): ?>
        <li 
            class="nav-item dropdown <?php echo e($isUrl([
                route('admin.user.index'),
                route('admin.role.index'),
                route('admin.banmodel.user.index'),
                route('admin.banvalue.index', ['type' => 'ip'])
            ])); ?> 
            <?php echo e($isUrlContains(['*/roles', '*/roles/*'])); ?>"
        >
            <a 
                class="nav-link dropdown-toggle"
                href="#" 
                id="userDropdown" 
                role="button"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-fw fa-users"></i>
                <span><?php echo e(trans('icore::users.route.index')); ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.user.index'))); ?>"
                    href="<?php echo e(route('admin.user.index')); ?>"
                    title="<?php echo e(trans('icore::users.route.index')); ?>"
                >
                    <?php echo e(trans('icore::users.route.index')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.roles.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrlContains(['*/roles', '*/roles/*'])); ?>"
                    href="<?php echo e(route('admin.role.index')); ?>"
                    title="<?php echo e(trans('icore::roles.route.index')); ?>"
                >
                    <?php echo e(trans('icore::roles.route.index')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.bans.view')): ?>
                <h6 class="dropdown-header">
                    <?php echo e(trans('icore::bans.route.index')); ?>:
                </h6>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.banmodel.user.index'))); ?>"
                    href="<?php echo e(route('admin.banmodel.user.index')); ?>"
                    title="<?php echo e(trans('icore::bans.model.user.route.index')); ?>"
                >
                    <?php echo e(trans('icore::bans.model.user.route.index')); ?>

                </a>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.banvalue.index', ['type' => 'ip']))); ?>"
                    href="<?php echo e(route('admin.banvalue.index', ['type' => 'ip'])); ?>"
                    title="<?php echo e(trans('icore::bans.value.ip.route.index')); ?>"
                >
                    <?php echo e(trans('icore::bans.value.ip.route.index')); ?>

                </a>
                <?php endif; ?>
            </div>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.filemanager.read')): ?>
        <li class="nav-item <?php echo e($isUrl(route('admin.filemanager.index'))); ?>">
            <a 
                class="nav-link" 
                href="<?php echo e(route('admin.filemanager.index')); ?>" 
                title="<?php echo e(trans('icore::filemanager.route.index')); ?>"
            >
                <i class="far fa-fw fa-image"></i>
                <span> <?php echo e(trans('icore::filemanager.route.index')); ?></span>
            </a>
        </li>
        <?php endif; ?>        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['admin.bans.view', 'admin.links.view', 'admin.tags.view'])): ?>
        <li 
            class="nav-item dropdown <?php echo e($isUrl([
                route('admin.banvalue.index', ['word']),
                route('admin.link.index', ['link']),
                route('admin.link.index', ['backlink']),
                route('admin.tag.index')
            ])); ?>"
        >
            <a 
                class="nav-link dropdown-toggle"
                href="#" 
                id="pagesDropdown" 
                role="button"
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <i class="fas fa-fw fa-tools"></i>
                <span><?php echo e(trans('icore::admin.route.settings')); ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.bans.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.banvalue.index', ['word']))); ?>"
                    href="<?php echo e(route('admin.banvalue.index', ['word'])); ?>"
                    title="<?php echo e(trans('icore::bans.value.word.route.index')); ?>"
                >
                    <?php echo e(trans('icore::bans.value.word.route.index')); ?>

                </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.links.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.link.index', ['link']))); ?>"
                    href="<?php echo e(route('admin.link.index', ['link'])); ?>"
                    title="<?php echo e(trans('icore::links.link.route.index')); ?>"
                >
                    <?php echo e(trans('icore::links.link.route.index')); ?>

                </a>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.link.index', ['backlink']))); ?>"
                    href="<?php echo e(route('admin.link.index', ['backlink'])); ?>"
                    title="<?php echo e(trans('icore::links.backlink.route.index')); ?>"
                >
                    <?php echo e(trans('icore::links.backlink.route.index')); ?>

                </a>
                <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.tags.view')): ?>
                <a 
                    class="dropdown-item <?php echo e($isUrl(route('admin.tag.index'))); ?>"
                    href="<?php echo e(route('admin.tag.index')); ?>"
                    title="<?php echo e(trans('icore::tags.route.index')); ?>"
                >
                    <?php echo e(trans('icore::tags.route.index')); ?>

                </a>
            <?php endif; ?>                
            </div>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/partials/sidebar.blade.php ENDPATH**/ ?>