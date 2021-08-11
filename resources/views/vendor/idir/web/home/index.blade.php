@extends(config('idir.layout') . '::web.layouts.layout')

@section('content')
<div class="jumbotron-home jumbotron-fluid m-0 background-{{ config('app.name_short') }}">
    <div class="container">
        <div class="card mb-3 border5" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-xl-2 col-md-12 col-12 glowna-{{ config('app.name_short') }}">
                </div>
                <div class="col-xl-7 col-md-6 col-12">
                    <div class="mb-0">
                        <div class="witaj-body witaj-{{ config('app.name_short') }}">
                            @render('idir::statComponent')
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 col-12 lewar text-center">
                    @render('idir::dir.CarouselLiteComponent', [
                    'limit' => null,
                    'max_content' => 0,
                    'shuffle' => true
                    ])
                </div>
            </div>
        </div>
        <div class="w-md-100 mx-auto">
            @render('idir::category.dir.gridComponent', [
            'cols' => 3,
            'category_count' => true,
            'category_icon' => true,
            'children_count' => true,
            'children_limit' => 4,
            'children_shuffle' => true
            ])
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        @if ($dirs->isNotEmpty())
        <div class="col-md-8 order-sm-1 order-md-2">
            <div>
                @foreach ($dirs as $dir)
                @include('idir::web.dir.partials.dir')
                @endforeach
            </div>
        </div>
        <div class="col-md-4 order-sm-2 order-md-1">
            <div class="rounded komentarze">
                @render('idir::comment.dir.commentComponent')
            </div>
        </div>
        @endif
    </div>
</div>
@include('icore::web.partials.toasts')
@endsection
