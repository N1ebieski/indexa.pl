@extends(config('idir.layout') . '::web.layouts.layout')

@section('content')
<div class="jumbotron jumbotron-fluid m-0 background">
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
                    @render('idir::dir.CarouselComponent', [
                    'limit' => null,
                    'max_content' => 0,
                    'shuffle' => true
                    ])
                </div>
            </div>
            <div class="text-white d-block mt-5">
                @render('idir::tag.dir.tagComponent', [
                    'limit' => 25,
                    'colors' => ['text-white']
                ])
            </div>
        </div>
    </div>
</div>
<div class="container">
    @render('idir::dir.carouselComponent', [
        'max_content' => 500
    ])
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
            @render('idir::category.dir.categoryComponent')
            @render('idir::comment.dir.commentComponent')
        </div>
        @endif
    </div>
    @render('idir::category.dir.gridComponent')
</div>
@include('icore::web.partials.toasts')
@endsection
