@if (collect($tags)->isNotEmpty())
<h3 class="h5">
    {{ trans('icore::tags.popular') }}
</h3>
<div class="mb-3">
    @foreach ($tags as $tag)
        <a 
            href="{{ route('web.tag.post.show', $tag->normalized) }}" 
            title="{{ $tag->name }}"       
            class="h{{ rand(1, 6) }} {{ is_array($colors) ? $colors[array_rand($colors)] : null }}"
        >
            {{ $tag->name }}
        </a>
        <span>{{ (!$loop->last) ? ', ' : '' }}</span>
    @endforeach
</div>
@endif
