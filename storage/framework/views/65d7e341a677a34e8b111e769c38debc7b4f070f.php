<?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('idir::tag.dir.tagComponent'), [
    'limit' => 40,
    'cats' => $catsAsArray['self'] ?? null,
    'colors' => ['text-success', 'text-primary', 'text-warning']
])->toHtml(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/dir/partials/sidebar.blade.php ENDPATH**/ ?>