@foreach ($categories as $category)
<div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
    <a href="{{ route('web.category.dir.show', [$category->slug, $region->slug]) }}" title="{{ $category->name }}" class="{{ $isUrl(route('web.category.dir.show', [$category->slug, $region->slug]), 'font-weight-bold') }} ">
        <span><span class="dziecko"></span>{{ str_repeat('', $category->real_depth) }}</span>
        @if (!empty($category->icon))
        <i class="{{ $category->icon }} text-center" style="width:1.5rem"></i>
        @endif
        <span class="text-success-{{ config('app.name_short') }}">{{ $category->name }}</span>
    </a>
    <span class="badge badge-{{ config('app.name_short') }} badge-pill">{{ $category->morphs_count }}</span>
</div>
@if ($category->relationLoaded('childrens'))
@include('idir::web.category.dir.partials.categories', [
'categories' => $category->childrens
])
@endif
@endforeach
