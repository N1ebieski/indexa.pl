@extends(config('idir.layout') . '::web.layouts.layout', [
'title' => [
$dir->title,
$comments->currentPage() > 1 ?
trans('icore::pagination.page', ['num' => $comments->currentPage()])
: null
],
'desc' => [$dir->short_content],
'keys' => [$dir->tagList],
'og' => [
'title' => $dir->title,
'desc' => $dir->short_content,
'image' => $dir->url !== null ? $dir->thumbnail_url : null
]
])

@section('breadcrumb')
<li class="breadcrumb-item ">
    <a href="{{ route('web.dir.index') }}" title="{{ trans('idir::dirs.route.index') }}">
        {{ trans('idir::dirs.route.index') }}
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    {{ $dir->title }}
</li>
@endsection
@section('content')
<!----wpis {{ $dir->group->border ?? null }} {{ $dir->id }} ----->
<div class="body-{{ $dir->group->border ?? null }} wpis-{{ $dir->id }} ">
    <div class="p3rem container">
        <div class="row">
            <div class="col pl-lg-0 order-2">
                <div class="rounded text-{{ $dir->group->border ?? null }} tlo-{{ $dir->group->border ?? null }}">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <h1 class="h4 tytul-{{ $dir->group->border ?? null }}">
                                {{ $dir->title }}
                            </h1>
                        </div>
                    </div>
                    <hr class="hr-{{ $dir->group->border ?? null }}">
                    <div class="text-justify">
                        {!! $dir->content_as_html !!}
                    </div>
                    <div class="d-flex">
                        <div class="ml-auto">
                            @if ($dir->url !== null)
                            <div class="text-primary"><i class="fab fa-internet-explorer"></i>&nbsp;{!! $dir->url_as_link !!}</div>
                            @endif
                        </div>
                    </div>
                    <hr class="hr-{{ $dir->group->border ?? null }}">
                    <div class="d-flex">
                        <ul class="list-inline text-sm mb-0 stats">
                            <li class="list-inline-item mr-3"><i class="far fa-clock  mr-1"></i>{{ trans('icore::default.created_at_diff') }}: {{ $dir->created_at_diff }}
                            </li>
                            @if ($dir->relationLoaded('stats'))
                            @foreach ($dir->stats as $stat)
                            <li class="list-inline-item mr-3">
                                <i class="fa fa-signal mr-1 "></i>
                                {{ trans("icore::stats.{$stat->slug}") }}: <b>{{ $stat->pivot->value }}</b>
                            </li>
                            @endforeach
                            @if ($statCtr > 0)
                            <li class="list-inline-item mr-3"><i class="fa fa-percent mr-1"></i>&nbsp;{{ $statCtr }}</li>
                            @endif
                            @endif
                            <li class="list-inline-item mr-3"><i class="far fa-address-card"></i> {{ $dir->id }}</li>
                            <li class="list-inline-item mr-3">
                                <input id="star-rating" name="star-rating" data-route="{{ route('web.rating.dir.rate', [$dir->id]) }}" value="{{ $dir->sum_rating }}" data-stars="5" data-step="1" data-size="xs" data-container-class="float-left ml-auto" @auth data-user-value="{{ $ratingUserValue }}" data-show-clear="{{ $ratingUserValue ? true : false }}" @else data-display-only="true" @endauth class="rating-loading" data-language="{{ config('app.locale') }}"><b>{{ $dir->sum_rating }}</b>
                            </li>
                        </ul>
                    </div>
                    <hr class="hr-{{ $dir->group->border ?? null }}">
                    @if ($dir->categories->isNotEmpty())
                    <ul class="kattt amenities-list list-inline text-{{ $dir->group->border ?? null }}">
                        <li class="list-inline-item mb-2">
                            <h4 class="h6 mb-4 mb-4 "><i class="far fa-folder"></i> &nbsp;{{ trans('icore::categories.categories.label') }}:&nbsp;</h4>
                        </li>
                        @foreach ($dir->categories as $category)
                        <li class="list-inline-item mb-2">
                            <span class="p-3 text-muted font-weight-normal">
                                <i class="far fa-folder-open"></i> <a href="{{ route('web.category.dir.show', [$category->slug]) }}" title="{{ $category->name }}">{{ $category->name }}</a>{{ (!$loop->last) ? ' ' : '' }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    @if ($dir->tags->isNotEmpty())
                    <li class="list-inline-item mb-2">
                        <h4 class="h6 mb-4 mb-4 "><i class="fa fa-hashtag"></i>&nbsp;{{ trans('idir::dirs.tags.label') }}:&nbsp;</h4>
                    </li>
                    @foreach ($dir->tags as $tag)
                    <li class="list-inline-item mb-2">
                        <span class="p-3 text-muted font-weight-normal badge badge-light badge-pill">
                            <a href=" {{ route('web.tag.dir.show', [$tag->normalized]) }}" title="{{ $tag->name }}">
                                {{ $tag->name }}
                            </a>{{ (!$loop->last) ? ' ' : '' }}
                        </span>
                    </li>
                    @endforeach
                    </ul>
                    @endif
                    <!--mapa-->
                    <div class="text-block">
                        @render('idir::map.dir.mapComponent', [
                        'dir' => $dir
                        ])
                    </div>
                    <!--koniec mapa-->
                </div>
                <!-----komentarze----->
                <div class="rounded text-{{ $dir->group->border ?? null }} tlo-{{ $dir->group->border ?? null }}">
                    <h4 class="h5 mb-4 mb-4" id="comments"><i class="far fa-comments"></i>&nbsp;{{ trans('icore::comments.comments') }} </h4>
                    <div id="filterContent">
                        @if ($comments->isNotEmpty())
                        @include('icore::web.comment.partials.filter')
                        @endif
                        <div id="comment">
                            @auth
                            @canany(['web.comments.create', 'web.comments.suggest'])
                            @include('icore::web.comment.create', [
                            'model' => $dir,
                            'parent_id' => 0
                            ])
                            @endcanany
                            @else
                            <a href="{{ route('login') }}" title="{{ trans('icore::comments.log_to_comment') }}">
                                {{ trans('icore::comments.log_to_comment') }}
                            </a>
                            @endauth
                        </div>
                        @if ($comments->isNotEmpty())
                        <div id="infinite-scroll">
                            @foreach ($comments as $comment)
                            @include('icore::web.comment.partials.comment', [
                            'comment' => $comment
                            ])
                            <hr class="hr-{{ $dir->group->border ?? null }}">
                            @endforeach
                            @include('icore::web.partials.pagination', [
                            'items' => $comments,
                            'fragment' => 'comments'
                            ])
                        </div>
                        @endif
                    </div>
                </div>
                <!--Koniec komentarze--->
                <!--podobne--->
                @if ($related->isNotEmpty())
                <div class="podobne rounded">
                    <h4 class="h5 mb-4 mb-4"><i class="fa fa-anchor"></i>&nbsp;{{ trans('idir::dirs.related') }}</h4>
                    <hr class="hr-{{ $dir->group->border ?? null }}">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled text-muted">
                                @foreach ($related as $rel)
                                <li class="mb-2">
                                    <span class="text-sm"><a href="{{ route('web.dir.show', [$rel->slug]) }}" title="{{ $rel->title }}">
                                            <i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                                            {{ $rel->title }}
                                        </a></span>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
                @endif
                <!--koniec podobne--->
            </div>
            <div class="col-12 col-lg-4 text-md-left text-center order-1 ">
                @if ($dir->url !== null)
                <div class="carousel mb2rem border5">
                    <a href="{{ $dir->url }}" class="item bg-image rounded " style="background-image: url('{{ $dir->thumbnail_url }}');" title="{{ $dir->title }}" target="_blank"></a>
                    <div class="kontener-{{ $dir->group->border ?? null }}">
                        <div class="grupa-{{ $dir->group->border ?? null }} outline-{{ $dir->group->border ?? null }}"></div>
                    </div>
                </div>
                @endif

                @if ($dir->group->fields->isNotEmpty())
                @foreach ($dir->group->fields->where('type', '!=', 'map') as $field)
                @if ($value = optional($dir->fields->where('id', $field->id)->first())->decode_value)

                <div class="rounded text-{{ $dir->group->border ?? null }} tlo-{{ $dir->group->border ?? null }}">
                    <div class="list-group list-group-flush mb-3">
                        <div class="list-group-item wpis-list">
                            <div class="float-left mr-2">
                                {{ $field->title }}:
                            </div>
                            <div class="float-right bold">
                                @switch ($field->type)
                                @case ('input')
                                @case ('textarea')
                                @case ('select')
                                {{ $value }}
                                @break;
                                @case ('multiselect')
                                @case ('checkbox')
                                {{ implode(', ', $value) }}
                                @break;
                                @case ('regions')
                                {{ implode(', ', $dir->regions->pluck('name')->toArray()) }}
                                @break;
                                @case ('image')
                                <img class="img-fluid" src="{{ app('filesystem')->url($value) }}">
                                @break;
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
                <div class="rounded">
                    <div class="list-group list-group-flush mb-3 padd15 p5">
                        <div class="list-group-item wpis-list">
                            <a class="btn btn-outline-primary btn-block shadow" href="#" data-toggle="modal" data-target="#linkModal" title="{{ trans('idir::dirs.link_dir_page') }}">
                                <span class="span-wpis">{{ trans('idir::dirs.link_dir_page') }}</span>
                            </a>
                        </div>
                        @if (isset($dir->user->email) && app('router')->has('web.contact.dir.show'))
                        <div class="list-group-item wpis-list">
                            @auth
                            <a class="showContact btn btn-outline-info btn-block" href="#" data-route="{{ route('web.contact.dir.show', [$dir->id]) }}" title="{{ trans('idir::contact.dir.route.show') }}" data-toggle="modal" data-target="#contactModal">
                                <span class="span-wpis">{{ trans('idir::contact.dir.route.show') }}</span>
                            </a>
                            @else
                            <a class="btn btn-outline-info btn-block" href="{{ route('login') }}" title="{{ trans('idir::contact.dir.log_to_contact') }}">
                                <span class="span-wpis"> {{ trans('idir::contact.dir.log_to_contact') }}</span>
                            </a>
                            @endauth
                        </div>
                        @endif
                        <div class="list-group-item wpis-list">
                            @can('web.dirs.edit')
                            @can('edit', $dir)
                            <a class="btn btn-danger btn-block" href="{{ route('web.dir.edit_1', [$dir->id]) }}" title="{{ trans('idir::dirs.premium_dir') }}">
                                <span class="span-wpis">{{ trans('idir::dirs.premium_dir') }}</span>
                                @endcan
                                @endcan
                            </a>
                        </div>
                        <div class="list-group-item wpis-list">
                            @auth
                            <a href="#" data-route="{{ route('web.report.dir.create', [$dir->id]) }}" title="{{ trans('icore::reports.route.create') }}" data-toggle="modal" data-target="#createReportModal" class="createReport btn btn-outline-danger btn-block">
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                                <span>{{ trans('icore::reports.route.create') }}</span>
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                            </a>
                            @else
                            <a href="{{ route('login') }}" title="{{ trans('icore::reports.log_to_report') }}" class="btn btn-outline-danger btn-block">
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                                <span> {{ trans('icore::reports.log_to_report') }}</span>
                                <i class="fas fa-exclamation-triangle text-danger"></i>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---postatni-->
</div>
<!---ostatni-->
@component('icore::web.partials.modal')
@slot('modal_id', 'linkModal')
@slot('modal_title')
<i class="fas fa-link"></i>
<span> {{ trans('idir::dirs.link_dir_page') }}</span>
@endslot
@slot('modal_body')
<div class="form-group">
    <textarea class="form-control" name="dir" rows="5" readonly>{{ $dir->link_as_html }}</textarea>
</div>
@endslot
@endcomponent
@auth
@component('icore::web.partials.modal')
@slot('modal_id', 'createReportModal')
@slot('modal_title')
<i class="fas fa-exclamation-triangle"></i>
<span> {{ trans('icore::reports.route.create') }}</span>
@endslot
@endcomponent
@component('icore::web.partials.modal')
@slot('modal_id', 'contactModal')
@slot('modal_size', 'modal-lg')
@slot('modal_title')
<i class="fas fa-paper-plane"></i>
<span> {{ trans('idir::contact.dir.route.show') }}</span>
@endslot
@endcomponent
@endauth
@endsection
@php
app(\N1ebieski\ICore\View\Components\CaptchaComponent::class)->toHtml()->render();
@endphp
