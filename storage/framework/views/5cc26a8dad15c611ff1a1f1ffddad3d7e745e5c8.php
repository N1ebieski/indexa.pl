<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <title><?php echo e($makeMeta(array_merge($title, [config('app.name')]), ' - ')); ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e($makeMeta(array_merge($desc, [config('app.desc')]), '. ')); ?>">
    <meta name="keywords" content="<?php echo e(mb_strtolower($makeMeta(array_merge($keys, [config('app.keys')]), ', '))); ?>">
    <meta name="robots" content="<?php echo e($index); ?>">
    <meta name="robots" content="<?php echo e($follow); ?>">

    <meta property="og:title" content="<?php echo e($og['title']); ?>">
    <meta property="og:description" content="<?php echo e($og['desc']); ?>">
    <meta property="og:type" content="<?php echo e($og['type']); ?>">
    <meta property="og:image" content="<?php echo e($og['image']); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="https://cdn.alg.pl/katalog/logo/<?php echo e(config('app.name_short')); ?>-logo.svg" type="image/svg+xml">
    <link rel="shortcut icon" href="https://cdn.alg.pl/katalog/logo/<?php echo e(config('app.name_short')); ?>-icon.svg" type="image/svg+xml">


    <link href="<?php echo e(mix('css/vendor/idir/vendor/vendor.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(mix($getStylesheet('css/vendor/idir'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($getStylesheet('css/custom'))); ?>" rel="stylesheet">


    <script src="<?php echo e(mix('js/vendor/idir/vendor/vendor.js')); ?>" defer></script>
    <script src="<?php echo e(mix('js/vendor/idir/web/web.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/custom/web/web.js')); ?>" defer></script>


<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">

</head>
<body>

    <?php echo $__env->make('idir::web.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content content-<?php echo e(config('app.name_short')); ?>">
        <?php echo $__env->make('icore::web.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('idir::web.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('icore::web.partials.policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo e(mix('js/vendor/idir/web/scripts.js')); ?>" defer></script>
    <?php echo $__env->yieldPushContent('script'); ?>
    <script src="<?php echo e(asset('js/custom/web/scripts.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/layouts/layout.blade.php ENDPATH**/ ?>