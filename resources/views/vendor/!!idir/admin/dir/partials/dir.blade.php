@section('thumbnail')
<div class="mt-2 d-flex flex-column" style="width:90px;height:68px">
    <div class="thumbnail d-inline position-relative">
        <img 
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
            data-src="{{ $dir->thumbnail_url }}" 
            class="lazy img-fluid border"
            alt="{{ $dir->title }}" 
            title="{{ $dir->title }}"
        >
    </div>
    <a 
        href="#" 
        data-route="{{ route('admin.thumbnail.dir.reload', [$dir->id]) }}" 
        class="badge badge-primary reloadThumbnail"
    >
        {{ trans('idir::dirs.reload_thumbnail') }}
    </a>
</div>
@overwrite
<div 
    id="row{{ $dir->id }}" 
    class="row border-bottom py-3 position-relative transition"
    data-id="{{ $dir->id }}"
>
    <div class="col my-auto d-flex w-100 justify-content-between">
        <div class="custom-control custom-checkbox">
            @can('admin.dirs.delete')
            <input 
                name="select[]" 
                type="checkbox" 
                class="custom-control-input select" 
                id="select{{ $dir->id }}" 
                value="{{ $dir->id }}"
            >
            <label class="custom-control-label" for="select{{ $dir->id }}">
            @endcan
            <ul class="list-unstyled mb-0 pb-0">
                <li>
                    {!! $dir->title_as_link !!}
                    {{-- @if ($dir->isUrl())
                    <span> - {{ $dir->url_as_host }}</span>
                    @endif --}}
                    @if ($dir->reports_count > 0)
                    <span>
                        <a 
                            href="#" 
                            class="badge badge-danger show" 
                            data-toggle="modal"
                            data-route="{{ route('admin.report.dir.show', [$dir->id]) }}"
                            data-target="#showReportDirModal"
                        >
                            {{ trans('icore::reports.route.show') }}: {{ $dir->reports_count }}
                        </a>
                    </span>
                    @endif
                </li>
                <li class="text-break" style="word-break:break-word">
                    <span id="content.{{ $dir->id }}">
                        {!! $dir->short_content !!}...
                    </span>
                    <a href="#" class="badge badge-primary checkContent">
                        {{ trans('idir::dirs.check_content') }}
                    </a>
                </li>
                @if ($dir->notes)
                <li class="text-break font-weight-bold" style="word-break:break-word">
                    {{ $dir->notes }}
                </li>
                @endif                
                @if ($dir->group->fields->isNotEmpty())
                @foreach ($dir->group->fields as $field)
                @if ($value = optional($dir->fields->where('id', $field->id)->first())->decode_value)
                <li class="text-break" style="word-break:break-word">
                    {{ $field->title }}: 
                    <span>
                    @switch($field->type)
                        @case('input')
                        @case('textarea')
                        @case('select')
                            {{ $value }}
                            @break

                        @case('multiselect')
                        @case('checkbox')
                            {{ implode(', ', $value) }}
                            @break

                        @case('regions')
                            {{ implode(', ', $dir->regions->pluck('name')->toArray()) }}
                            @break

                        @case('image')
                            <br>
                            <img class="img-fluid" src="{{ app('filesystem')->url($value) }}">
                            @break

                        @case('map')
                            {{ $value[0]->lat }} : {{ $value[0]->long }}
                            @break
                    @endswitch
                    </span>
                </li>
                @endif
                @endforeach
                @endif                
            </ul>
            @can('admin.dirs.delete')
            </label>
            @endcan            
            <div class="d-flex flex-column">
                <ul class="list-unstyled mb-0 pb-0 flex-grow-1">
                    @if ($dir->tagList)
                    <li class="text-break" style="word-break:break-word">
                        <small>
                            {{ trans('idir::dirs.tags.label') }}: {{ $dir->tagList }}
                        </small>
                    </li>
                    @endif
                             @foreach ($dir->stats as $stat)
                            <li class="list-inline-item mr-3">
                                <i class="fa fa-signal mr-1 "></i>
                                {{ trans("icore::stats.{$stat->slug}") }}: <b>{{ $stat->pivot->value }}</b>
                            </li>
                            @endforeach
					<li class="list-inline-item mr-3"><i class="far fa-address-card"></i> {{ $dir->id }}</li>
					<li>{!! $dir->link !!}</li>
                   @if ($dir->categories->isNotEmpty())
                    <li>
                        <small>
                            <span>
                                {{ trans('icore::categories.categories.label') }}:
                            </span> 
                            <span>
                                @foreach ($dir->categories as $category)
                                <a href="{{ route('admin.dir.index', ['filter[category]' => $category->id]) }}"
                                title="{{ $category->name }}">
                                    {{ $category->name }}
                                </a>{{ (!$loop->last) ? ', ' : '' }}
                                @endforeach
                            </span>
                        </small>
                    </li>
                    @endif                   
                    <li>
                        <small>
                            <span>
                                {{ trans('idir::dirs.group') }}:
                            </span>
                            <span>
                                <a 
                                    href="{{ route('admin.dir.index', ['filter[group]' => $dir->group->id]) }}"
                                    title="{{ $dir->group->name }}"
                                >
                                    {{ $dir->group->name }}
                                </a>
                            </span>
                        </small>
                        @if ($dir->group->prices->isNotEmpty() && $dir->payments->isNotEmpty())
                        <span>
                            <a 
                                href="#" 
                                class="badge badge-warning show" 
                                data-toggle="modal"
                                data-route="{{ route('admin.payment.dir.show_logs', [$dir->id]) }}"
                                data-target="#showPaymentLogsDirModal"
                            >
                                {{ trans('idir::payments.route.show_logs') }}
                            </a>
                        </span>
                        @endif
                    </li>
                    @if (isset($dir->user))
                    <li>
                        <small>
                            <span>
                                {{ trans('idir::dirs.author') }}:
                            </span>
                            <span>
                                <a 
                                    href="{{ route('admin.dir.index', ['filter[author]' => $dir->user->id]) }}"
                                    title="{{ $dir->user->name }}"
                                >
                                    {{ $dir->user->name }}
                                </a>
                            </span>
                            <span>
                                <a 
                                    href="{{ route('admin.dir.index', ['filter[search]' => "user:\"{$dir->user->ip}\""]) }}"
                                    title="{{ $dir->user->ip }}"
                                >
                                    {{ $dir->user->ip }}
                                </a>
                            </span>
                        </small>
                    </li>
                    @endif
                    @if ($dir->privileged_at !== null)
                    <li>
                        <small>
                            {{ trans('idir::dirs.privileged_to') }}: 
                        </small>
                        <small>
                            {{ $dir->privileged_to !== null ? $dir->privileged_to_diff : trans('idir::dirs.unlimited') }}
                        </small>
                    </li>
                    @endif                    
                    <li>
                        <small>
                            {{ trans('icore::filter.created_at') }}: {{ $dir->created_at_diff }}
                        </small>
                    </li>
                    <li>
                        <small>
                            {{ trans('icore::filter.updated_at') }}: {{ $dir->updated_at_diff }}
                        </small>
                    </li>
					<li>adres www: {!! $dir->url_as_link !!}</li>
                </ul>
                @if ($dir->isUrl() && !$dir->isNotOk())
                <div class="mb-3 d-sm-none">
                    @yield('thumbnail')
                </div>
                @endif
            </div>
        </div>
        <div class="text-right ml-3 d-flex flex-column">
            <div class="responsive-btn-group">
                @can('admin.dirs.edit')
                <div class="btn-group-vertical">
                    <button 
                        data-toggle="modal" 
                        data-target="#editModal"
                        data-route="{{ route('admin.dir.edit', [$dir->id]) }}"
                        type="button" class="btn btn-primary edit"
                    >
                        <i class="far fa-edit"></i>
                        <span class="d-none d-sm-inline"> {{ trans('icore::default.edit') }}</span>
                    </button>
                    <a 
                        class="btn btn-primary align-bottom" 
                        href="{{ route('admin.dir.edit_full_1', [$dir->id]) }}"
                        role="button" 
                        target="_blank" 
                        rel="noopener"
                    >
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-sm-inline"> {{ trans('icore::default.editFull') }}</span>
                    </a>
                </div>
                @endcan
                @can('admin.dirs.status')
                @if ($dir->isUpdateStatus())
                <button 
                    data-status="{{ $dir::ACTIVE }}" 
                    type="button" 
                    class="btn btn-success statusDir"
                    data-route="{{ route('admin.dir.update_status', [$dir->id]) }}" 
                    data-id="{{ $dir->id }}"
                    {{ $dir->status == $dir::ACTIVE ? 'disabled' : '' }}
                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        {{ trans('icore::default.active') }}
                    </span>
                </button>
                <div class="btn-group-vertical">
                    <button 
                        data-status="{{ $dir::INACTIVE }}" 
                        type="button" 
                        class="btn btn-warning statusDir"
                        data-route="{{ route('admin.dir.update_status', [$dir->id]) }}" 
                        data-id="{{ $dir->id }}"
                        {{ $dir->status == $dir::INACTIVE ? 'disabled' : '' }}
                    >
                        <i class="fas fa-toggle-off"></i>
                        <span class="d-none d-sm-inline"> 
                            {{ trans('icore::default.inactive') }}
                        </span>
                    </button>
                    <button 
                        data-status="{{ $dir::INCORRECT_INACTIVE }}" 
                        type="button" 
                        class="btn btn-warning"
                        data-route="{{ route('admin.dir.update_status', [$dir->id]) }}"
                        data-toggle="dir-confirmation-reason" 
                        data-id="{{ $dir->id }}" 
                        data-btn-ok-label=" {{ trans('icore::default.yes') }}" 
                        data-btn-ok-icon-class="fas fa-check mr-1"
                        data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover statusDir" 
                        data-btn-cancel-label=" {{ trans('icore::default.cancel') }}"
                        data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                        data-btn-cancel-icon-class="fas fa-ban mr-1"
                        data-title="{{ trans('idir::dirs.confirm.correct') }}"
                        data-reasons="{{ json_encode(config('idir.dir.reasons')) }}" 
                        data-reasons-label="{{ trans('idir::dirs.reason.label') }}"
                        data-reasons-custom="{{ trans('idir::dirs.reason.custom') }}"                        
                        {{ $dir->status == $dir::INCORRECT_INACTIVE ? 'disabled' : '' }}
                    >
                        <i class="far fa-times-circle"></i>
                        <span class="d-none d-sm-inline"> 
                            {{ trans('idir::dirs.correct') }}
                        </span>
                    </button>                    
                </div>
                @elseif ($dir->isNotOk())
                <button 
                    type="button" 
                    class="btn btn-success"
                    data-route="{{ route('admin.status.delay', [$dir->getRelation('status')->id]) }}" 
                    data-id="{{ $dir->id }}"
                    data-toggle="dir-confirmation-delay" 
                    data-btn-ok-label="{{ trans('icore::default.yes') }}" 
                    data-btn-ok-icon-class="fas fa-check mr-1"
                    data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover delayDir" 
                    data-btn-cancel-label="{{ trans('icore::default.cancel') }}"
                    data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                    data-btn-cancel-icon-class="fas fa-ban mr-1"
                    data-title="{{ trans('idir::status.confirm.delay') }}"
                    data-delays="{{ json_encode(config('idir.dir.status.delays')) }}" 
                    data-delays-label="{{ trans('idir::status.delay_for.label') }}"
                    data-delays-custom="{{ trans('idir::status.delay_for.custom') }}"
                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        {{ trans('idir::status.delay') }}
                    </span>
                </button>
                @elseif ($dir->isBacklinkNotOk())
                <button 
                    type="button" 
                    class="btn btn-success"
                    data-route="{{ route('admin.backlink.delay', [$dir->getRelation('backlink')->id]) }}" 
                    data-id="{{ $dir->id }}"
                    data-toggle="dir-confirmation-delay" 
                    data-btn-ok-label="{{ trans('icore::default.yes') }}" 
                    data-btn-ok-icon-class="fas fa-check mr-1"
                    data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover delayDir" 
                    data-btn-cancel-label="{{ trans('icore::default.cancel') }}"
                    data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                    data-btn-cancel-icon-class="fas fa-ban mr-1"
                    data-title="{{ trans('idir::backlinks.confirm.delay') }}"
                    data-delays="{{ json_encode(config('idir.dir.backlink.delays')) }}" 
                    data-delays-label="{{ trans('idir::backlinks.delay_for.label') }}"
                    data-delays-custom="{{ trans('idir::backlinks.delay_for.custom') }}"
                >
                    <i class="fas fa-toggle-on"></i>
                    <span class="d-none d-sm-inline"> 
                        {{ trans('idir::backlinks.delay') }}
                    </span>
                </button>    
                @endif
                @endcan
                <div class="btn-group-vertical">
                    @can('admin.dirs.delete')
                    <button 
                        class="btn btn-danger" 
                        data-status="delete" 
                        data-toggle="dir-confirmation-reason"
                        data-route="{{ route('admin.dir.destroy', [$dir->id]) }}" 
                        data-id="{{ $dir->id }}"
                        type="button" 
                        data-btn-ok-label=" {{ trans('icore::default.yes') }}" 
                        data-btn-ok-icon-class="fas fa-check mr-1"
                        data-btn-ok-class="btn h-100 d-flex justify-content-center btn-primary btn-popover destroyDir" 
                        data-btn-cancel-label=" {{ trans('icore::default.cancel') }}"
                        data-btn-cancel-class="btn h-100 d-flex justify-content-center btn-secondary btn-popover" 
                        data-btn-cancel-icon-class="fas fa-ban mr-1"
                        data-title="{{ trans('icore::default.confirm') }}"
                        data-reasons="{{ json_encode(config('idir.dir.reasons')) }}" 
                        data-reasons-label="{{ trans('idir::dirs.reason.label') }}"
                        data-reasons-custom="{{ trans('idir::dirs.reason.custom') }}"                        
                    >
                        <i class="far fa-trash-alt"></i>
                        <span class="d-none d-sm-inline">
                            {{ trans('icore::default.delete') }}
                        </span>
                    </button>
                    @endcan
                    @can('admin.bans.create')
                    <button 
                        type="button" 
                        class="btn btn-dark create"
                        data-route="{{ route('admin.banmodel.dir.create', [$dir->id]) }}"
                        data-toggle="modal" 
                        data-target="#createBanDirModal"
                    >
                        <i class="fas fa-user-slash"></i>
                        <span class="d-none d-sm-inline">
                            {{ trans('icore::default.ban') }}
                        </span>
                    </button>
                    @endcan
                </div>
            </div>
            @if ($dir->isUrl() && !$dir->isNotOk())
            <div class="d-none d-sm-block mt-auto ml-auto mb-3">
                @yield('thumbnail')
            </div>
            @endif 
        </div>      
    </div>     
</div>
