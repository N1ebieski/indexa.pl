@if ($dirs->isNotEmpty())
<!---14:59:21--->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($dirs as $dir)
        <div class="carousel-item {{ $loop->first ? 'active' : null }}">
            <div class="row polecamy">
                @if ($dir->isUrl())
                <a href="{{ route('web.dir.show', [$dir->slug]) }}" title="{{ $dir->title }}">
                    <div class="col">
                        <img src="{{ $dir->thumbnail_url }}" class="img-fluid mx-auto d-block" alt="{{ $dir->title }}">
                    </div>
                    @endif
                    <div class="col kontener-polecamy">
                        <div class="polecamy-{{ config('app.name_short') }}">
                            <h2 class="h66">
                                {{ $dir->title }}
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
