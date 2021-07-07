@if (collect($tags)->isNotEmpty())
<div class="text-center">
    @foreach ($tags as $tag)
        <span>
            <a 
                href="{{ route('web.tag.dir.show', $tag->normalized) }}" 
                title="{{ $tag->name }}"
                class="h{{ rand(1, 6) }} {{ is_array($colors) ? $colors[array_rand($colors)] : null }}"
            >
                {{ $tag->name }}
            </a>
        </span>
        <span>{{ (!$loop->last) ? ' ' : '' }}</span>
    @endforeach
</div>

@endif
