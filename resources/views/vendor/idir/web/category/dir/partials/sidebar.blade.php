@render('idir::region.category.regionComponent', [
'region' => $region,
'category' => $category
])

<div class="list-group list-group-flush mb-3 ramkat">
    @if ($category->relationLoaded('ancestors'))
    @include('idir::web.category.dir.partials.categories', [
    'categories' => $category->ancestors
    ])
    @endif
    <div class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('web.category.dir.show', [$category->slug, $region->slug]) }}" title="{{ $category->name }} w {{ config('app.name_short') }}" class="{{ $isUrl(route('web.category.dir.show', [$category->slug, $region->slug]), 'font-weight-bold') }}">
            <span><span class="dzieckodziecko"></span>{{ str_repeat('', $category->real_depth) }}</span>
            @if (!empty($category->icon))
            <i class="{{ $category->icon }} text-center icon-{{ config('app.name_short') }}" style="width:1.5rem"></i>
            @endif
            <span class="font-weight-bold text-success-{{ config('app.name_short') }}">{{ $category->name }}</span>
        </a>
        <span class="badge badgebig-{{ config('app.name_short') }} badge-pill">{{ $category->morphs_count }}</span>
    </div>
    @if ($category->relationLoaded('childrens'))
    @include('idir::web.category.dir.partials.categories', [
    'categories' => $category->childrens
    ])
    @endif
</div>
@render('idir::tag.dir.tagComponent', [
'limit' => 25,
'cats' => $catsAsArray['self'] ?? null,
    'colors' => ['text-success', 'text-primary', 'text-warning']
])


