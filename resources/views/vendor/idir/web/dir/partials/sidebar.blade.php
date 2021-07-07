@render('idir::tag.dir.tagComponent', [
    'limit' => 40,
    'cats' => $catsAsArray['self'] ?? null,
    'colors' => ['text-success', 'text-primary', 'text-warning']
])