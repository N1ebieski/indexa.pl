@extends(config('idir.layout') . '::web.layouts.layout', [
'title' => [trans('icore::friends.route.index')],
'desc' => [trans('icore::friends.route.index')],
'keys' => [trans('icore::friends.route.index')]
])

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">{{ trans('icore::friends.route.index') }}</li>
@endsection

@section('content')
<div class="container">
        <h1 class="h4 border-bottom pb-2">
            <i class="fa fa-anchor"></i>&nbsp;&nbsp;{{ trans('icore::friends.friends') }}
        </h1>
    <div class="ramka2">

        <ul class="list-unstyled text-muted">

            @foreach ($dirs as $dir)
            <li class="mb-2"><span class="text-sm"><i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                    {!! $dir->link !!}
                </span></li>
            @endforeach

            <li class="mb-2"><span class="text-sm"><i class="fas fa-external-link-alt text-secondary w-1rem mr-3 text-center"></i>
                    <a href="https://hanza.pl" target="_blank" title="Nieruchomości nad morzem">Nieruchomości nad morzem</a>
                </span></li>

        </ul>
    </div>
</div>
@endsection
