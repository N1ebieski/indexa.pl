<div class="mb-3 tagis rounded">
<div id="map-poland">
    <ul class="poland" style="display:none">
        @foreach ($regions as $r)
        <li class="pl{{ $loop->iteration }}">
            <a 
                href="{{ route('web.category.dir.show', [$category->slug, $r->slug === $region->slug ? null : $r->slug]) }}"
                class="{{ $r->slug === $region->slug ? 'active-region' : null }}"
            >
                {{ $r->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
</div>