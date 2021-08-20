<footer class="page-footer border-top font-small pt-4 mt50">
    <div class="container text-center text-md-left">
        <div class="row ">
            <div class="col-md mx-auto">
                <h5 class="mt-3 mb-4">
                    {{ config('app.name') }}
                </h5>
                <p>{{ config('app.desc') }}</p>
            </div>
            @if (app('router')->has('web.newsletter.store'))
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md mx-auto">
                @render('icore::newsletterComponent')
            </div>
            @endif
            <hr class="clearfix w-100 d-md-none">
        </div>
        <hr class="hr-{{ $dir->group->border ?? null }}">
        <div class="col-md-auto text-center">
            <!--linki -->
			<a href="{{ route('web.dir.index') }}" class="{{ $isUrl(route('web.dir.index'), 'font-weight-bold') }}" title="{{ trans('idir::dirs.route.index') }} {{ config('app.name') }}">Katalog {{ config('app.name_short') }}</a> |
			<a href="{{ route('web.friend.index') }}" title="{{ trans('icore::friends.route.index') }}" class="{{ $isUrl(route('web.friend.index'), 'font-weight-bold') }}">{{ trans('icore::friends.route.index') }}</a> |
			<a href="/info/regulamin" rel="nofollow">Regulamin</a> |
			<a href="https://alg.pl/polityka" target="_blank" rel="nofollow">Polityka Prywatności</a> |
			<a href="https://alg.pl/mk" target="_blank" rel="nofollow">Multikody</a> |
            <a href="{{ route('web.contact.show') }}" title="{{ trans('icore::contact.route.show') }}" class="{{ $isUrl(route('web.contact.show'), 'font-weight-bold') }}">
                {{ trans('icore::contact.route.show') }}
            </a> |
            <hr class="hr-{{ $dir->group->border ?? null }}">
            @render('idir::linkComponent', ['limit' => 5, 'cats' => $catsAsArray ?? null])
            <!--linkiKoniec-->
        </div>
        <hr class="hr-{{ $dir->group->border ?? null }}">
        <div class="d-flex justify-content-center">
            <div class="footer-copyright text-center py-3 mr-3">
                <small>
                    2005 - {{ now()->year }} Copyright © <a href="https://alg.pl" target="_blank" rel="nofollow">ALG.PL</a> v 3.{{ config('idir.version') }}2307 dla <a href="https://{{ config('app.name_short') }}">{{ config('app.name_short') }}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fas fa-users text-danger"></i><span> @render('statComponentOnline')</span>
                </small>
                <br />
              <small><a href="https://wioskisos.org/" target="_blank" rel="nofollow"><img src="https://cdn.alg.pl/katalog/pic/wioskisos.png" alt="" width="260" height="70" /></a> 
			  </small>
            </div>
        </div>
</footer>

