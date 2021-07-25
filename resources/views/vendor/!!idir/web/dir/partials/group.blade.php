<!--group.blade.php---->
		<div class="card-header text-center bd-{{ config('app.name_short') }} colorw-{{ config('app.name_short') }}">
            <span class="font-weight-bold grupa">{{ $group->name }}</span>
			<br />
            @if ($group->prices->isNotEmpty())
            <span> <span class="three-rem-font font-weight-bold"> {{ $group->prices->sortBy('price')->first()->price }} zł.</span><br />
			za {{ ($days = $group->prices->sortBy('price')->first()->days) !== null ? $days . ' ' . mb_strtolower(trans('idir::groups.days')) : mb_strtolower(trans('idir::groups.unlimited')) }}</span>
            @endif

            <h1 class="card-title pricing-card-title"> <small class="darmowy colorw-{{ config('app.name_short') }}">
                    {{ $group->prices->isNotEmpty() ? trans('', [
                    'limit' => $days !== null ? 
                        mb_strtolower(trans('idir::groups.days')) 
                        : mb_strtolower(trans('idir::groups.unlimited'))
                ]) : trans('idir::groups.payment.0') }}</small></h1>
            <h4 class="my-0 fw-normal text-center"></h4>
        </div>
        <div>
            @if (!empty($group->desc))
            <div class="card-body flex-wrap">
                <p class="text-danger ">{{ $group->desc }}</p>
                <hr>
            </div>
            @endif
            <ul class="list-group list-group-flush">
                @if ($group->privileges->isNotEmpty())
                @foreach ($group->privileges as $privilege)
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">{{ __($privilege->name) }}</div>
                </li>
                @endforeach
                @endif
                @if (!empty($group->border))
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">{{ __('card of your site highlighted on listings') }}</div>
                </li>
                @endif
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">
                        <span>{{ mb_strtolower(trans('idir::groups.apply_status.label')) }}: </span>
                        <span class="font-weight-bold text-success-{{ config('app.name_short') }}">{{ trans("idir::groups.apply_status.{$group->apply_status}") }}</span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">
                        <span>{{ mb_strtolower(trans('idir::groups.max_cats.label')) }}: </span>
                        <span class="font-weight-bold text-success-{{ config('app.name_short') }}">{{ $group->max_cats }}</span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">
                        <span>{{ mb_strtolower(trans('idir::groups.url.label')) }}: </span>
                        <span class="font-weight-bold text-success-{{ config('app.name_short') }}">{{ trans("idir::groups.url.{$group->url}") }}</span>
                    </div>
                </li>
                <li class="list-group-item d-flex">
                    <i class="fas fa-check my-auto text-success-{{ config('app.name_short') }}"></i>
                    <div class="ml-3">
                        <span>{{ mb_strtolower(trans('idir::groups.backlink.label')) }}: </span>
                        <span class="font-weight-bold text-success-{{ config('app.name_short') }}">{{ trans("idir::groups.backlink.{$group->backlink}") }}</span>
                    </div>
                </li>
                <li class="list-group-item text-center ">

                </li>
            </ul>
        </div>
