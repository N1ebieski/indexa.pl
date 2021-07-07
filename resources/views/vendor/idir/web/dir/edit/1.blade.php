@extends(config('idir.layout') . '::web.layouts.layout', [
'title' => [
$dir->title,
trans('idir::dirs.route.step', ['step' => 1]),
trans('idir::dirs.route.edit.1')
],
'desc' => [$dir->title, trans('idir::dirs.route.edit.1')],
'keys' => [$dir->title, trans('idir::dirs.route.edit.1')]
])
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('web.dir.index') }}" title="{{ trans('idir::dirs.route.index') }}">
        {{ trans('idir::dirs.route.index') }}
    </a>
</li>
<li class="breadcrumb-item">
    {{ trans('idir::dirs.route.edit.index') }}
</li>
<li class="breadcrumb-item">
    {{ $dir->title }}
</li>
<li class="breadcrumb-item active" aria-current="page">
    {{ trans('idir::dirs.route.step', ['step' => 1]) }} {{ trans('idir::dirs.route.edit.1') }}
</li>
@endsection
@section('content')
<div class="container">
    @include('icore::web.partials.alerts')
    <h1 class="h3 border-bottom pb-2">
        {{ trans('idir::dirs.route.edit.1') }}
    </h1>
    <div class="progress mb-4">
        <div class="progress-bar" role="progress-bar progress-bar-striped" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>
    @if ($groups->isNotEmpty())
<div class="row">
    <div class="col d-flex align-items-center justify-content-center">
        <div class="cd-pricing-switcher mb-3">
            <nav class="credit-tabs">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-normal-tab" data-toggle="tab" href="#nav-normal" 
            role="tab" aria-controls="nav-normal" aria-selected="true">Wpis pojedynczy</a>
            <a class="nav-item nav-link" id="nav-multikod-tab" data-toggle="tab" href="#nav-multikod" 
            role="tab" aria-controls="nav-multikod" aria-selected="false">MultiKod</a>
        </div>
    </nav>
        </div>
    </div>
</div>
    <div class="tab-content" id="nav-tabContent">
        @foreach (['normal' => false, 'multikod' => true] as $key => $value)
        <div class="tab-pane fade show {{ $loop->first ? 'active' : null }}" id="nav-{{ $key }}" 
        role="tabpanel" aria-labelledby="nav-{{ $key }}-tab">        
            <div class="row">
                @foreach($groups->filter(function ($item) use ($value) { return str_contains(strtolower($item->name), 'multikod') === $value; }) as $group)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 {{ $dir->isGroup($group->id) ? 'bg-yellow' : null }}">
                        <span class="blink text-center">
                            {{ $dir->isGroup($group->id) ? 'AKTUALNIE POSIADASZ TĄ GRUPĘ' : null }}
                        </span>
                        @include('idir::web.dir.partials.group')
                        @if ($dir->isGroup($group->id))

                        @if ($dir->isRenew())
                        <a href="{{ route('web.dir.edit_renew', [$dir->id]) }}" class="cd-select btn w-100 bg-orange group-create-button card-footer mt-auto text-center">{{ trans('idir::dirs.renew_group') }}
                        </a>

                        @endif
                        <a href="{{ route('web.dir.edit_2', [$dir->id, $group->id]) }}" class="cd-select btn w-100 bg-orange group-create-button card-footer mt-auto text-center">{{ trans('idir::dirs.choose_group') }}
                        </a>

                        @elseif ($group->isAvailable())
                        <a href="{{ route('web.dir.edit_2', [$dir->id, $group->id]) }}" class="cd-select btn w-100 bg-orange group-create-button card-footer mt-auto text-center">{{ trans('idir::dirs.change_group') }}
                        </a>
                        @else
                        <button type="button" class="w-100 btn btn-lg {{ $group->isAvailable() ? null : 'btn-warning' }}">
                            {{ trans('idir::dirs.group_limit', [
                            'dirs' => $group->max_models ?? trans('idir::dirs.unlimited'),
                            'dirs_today' => $group->max_models_daily ?? trans('idir::dirs.unlimited')
                        ]) }}
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach                
    </div>
    @else
    <p>{{ trans('idir::groups.empty') }}</p>
    @endif
</div>
@endsection
