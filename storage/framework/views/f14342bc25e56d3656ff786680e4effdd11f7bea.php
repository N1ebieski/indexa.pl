<?php if($pages->isNotEmpty()): ?>
<ul id="pagesToggle" class="navbar-nav pr-3 pr-md-1">
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item dropdown <?php echo e($isUrlContains($page->urls ?? null)); ?>">
        <?php if(empty($page->content_html)): ?>
        <a 
            href="#" 
            class="nav-link" 
            role="button" 
            id="navbarDropdownMenu<?php echo e($page->id); ?>"
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false"
        >
        <?php else: ?>
        <a 
            href="<?php echo e(route('web.page.show', $page->slug)); ?>" 
            title="<?php echo e($page->title); ?>"
            class="nav-link <?php echo e($isUrl(route('web.page.show', $page->slug))); ?>"
        >
        <?php endif; ?>
            <?php if(!empty($page->icon)): ?>
            <i class="<?php echo e($page->icon); ?>"></i>
            <?php endif; ?>
            <span class="d-md-inline d-none"><?php echo e($page->short_title); ?></span>
            <span class="d-md-none d-inline"><?php echo e($page->title); ?></span>
        </a>
        <?php if(empty($page->content_html) && $page->childrens->isNotEmpty()): ?>
        <div 
            class="dropdown-menu dropdown-menu-right <?php echo e($loop->last ? 'mb-3' : null); ?>" 
            aria-labelledby="navbarDropdownMenu<?php echo e($page->id); ?>"
        >
            <?php $__currentLoopData = $page->childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a 
                class="dropdown-item <?php echo e($isUrl(route('web.page.show', $children->slug))); ?>"
                href="<?php echo e(route('web.page.show', $children->slug)); ?>"
            >
                <?php if(!empty($children->icon)): ?>
                <i class="fa-fw <?php echo e($children->icon); ?>"></i>
                <?php endif; ?>
                <span><?php echo e($children->title); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/components/page/menu.blade.php ENDPATH**/ ?>