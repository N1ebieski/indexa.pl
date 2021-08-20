<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <title><?php echo e($makeMeta(array_merge($title, [trans('icore::admin.route.index'), config('app.name')]), ' - ')); ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e($makeMeta(array_merge($desc, [trans('icore::admin.route.index'), config('app.desc')]), '. ')); ?>">
    <meta name="keywords" content="<?php echo e(mb_strtolower($makeMeta(array_merge($keys, [trans('icore::admin.route.index'), config('app.keys')]), ', '))); ?>">
    <meta name="robots" content="noindex, nofollow">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="https://cdn.alg.pl/katalog/logo/<?php echo e(config('app.name_short')); ?>-icon.svg" type="image/svg+xml">
    <link href="<?php echo e(mix('css/vendor/idir/vendor/vendor.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('style'); ?>
    <link href="<?php echo e(mix($getStylesheet('css/vendor/idir'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($getStylesheet('css/custom'))); ?>" rel="stylesheet">

    <script src="<?php echo e(mix('js/vendor/idir/vendor/vendor.js')); ?>" defer></script>
    <script src="<?php echo e(mix('js/vendor/idir/admin/admin.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/custom/admin/admin.js')); ?>" defer></script>
</head>
<body>

    <?php echo $__env->make('idir::admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="wrapper">

        <?php echo $__env->make('idir::admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">

            <div class="menu-height"></div>

            <div class="container-fluid">
                <?php echo $__env->make('icore::admin.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('icore::admin.partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <?php echo $__env->make('idir::admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php echo $__env->yieldPushContent('script'); ?>
    <script src="<?php echo e(mix('js/vendor/idir/admin/scripts.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/custom/admin/scripts.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/admin/layouts/layout.blade.php ENDPATH**/ ?>