<!--dir.blade.php--->
<!------Wpis {{ $dir->group->border ?? null }}---->
<div class="mb-4 ramka-{{ $dir->group->border ?? null }} shadow-sm rounded">

    <div class="row">
        <div class="col-sm-4 text-center order-1">
            @if ($dir->url !== null)
            <div>
			<a href="{!! $dir->slug !!}"><img src="{{ $dir->thumbnail_url }}" class="img-fluid border5 mx-auto d-block" alt="{{ $dir->title }}"></a>
                    <div class="kontener-dir-{{ $dir->group->border ?? null }}">
                        <div class="grupa-dir-{{ $dir->group->border ?? null }} outline-dir-{{ $dir->group->border ?? null }}"></div>
                    </div>
            </div>
            @endif
        </div>
        <div class="col-sm-8 pl-sm-0 mt-2 mt-sm-0 order-2 ">
		    <h2 class="h6 tytuldir">
        {!! $dir->link !!}
    </h2>
            <div class="d-flex mb-2 datadir border-{{ $dir->group->border ?? null }}">
                <small class="mr-auto">
                   <i class="far fa-clock"></i> {{ trans('icore::default.created_at_diff') }}: {{ $dir->created_at_diff }}
                </small>
                <small class="ml-auto">
                    <input id="star-rating{{ $dir->id }}" name="star-rating{{ $dir->id }}" value="{{ $dir->sum_rating }}" data-stars="5" data-display-only="true" data-size="xs" class="rating-loading" data-language="{{ config('app.locale') }}">
                </small>
            </div>

            <div class="text-break" style="word-break:break-word">
                <p class="text-justify contentlink opis">{{ $dir->short_content }}...</p>
<div class="row"><div class="col-auto mr-auto"></div><div class="col-auto"><a class="r-link rr-link text-underlined clink-{{ $dir->group->border ?? null }}" href="{{ route('web.dir.show', [$dir->slug]) }}">{{ trans('idir::dirs.more') }}</a></div></div>
               
            </div>


        </div>
    </div>


</div>
