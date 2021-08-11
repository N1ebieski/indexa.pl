@section('logo')
<div id="navbarLogo" class="flex-grow-1 mr-2">
    <a href="/" class="navbar-brand" title="{{ config('app.name') }}" alt="{{ config('app.name_short') }}" title="{{ config('app.name_short') }}">
        <img src="https://cdn.alg.pl/katalog/logo/{{ config('app.name_short') }}-logo.svg" class="pb-3 logo logo-{{ config('app.name_short') }}" alt="{{ config('app.name_short') }}" title="{{ config('app.name') }}">
        <span class="domena-{{ config('app.name_short') }}">{{ config('app.name_short') }}</span>
    </a>
</div>
@endsection

@section('navbar-toggler')
<a href="#" id="navbarToggle" class="my-auto navbar-toggler" role="button">
    <span class="navbar-toggler-icon"></span>
</a>
@endsection

@section('search-toggler')
<a href="#" class="nav-link search-toggler" role="button">
	    <i class="fa fa-lg fa-search lupka-{{ config('app.name_short') }}"></i>
</a>
@endsection

<nav class="navbar bd-{{ config('app.name_short') }} menu navbar-expand-md navbar-light fixed-top border-bottom">
    <div class="container">
        
        <div class="d-flex flex-grow-1 navbar-search pr-3 pr-md-0">
            @yield('logo')
            <form 
                id="searchForm" 
                method="GET" 
                action="{{ route('web.search.index') }}" 
                class="my-auto w-100 hide search"
            >
                <div class="input-group">
                    <input 
                        id="typeahead" 
                        data-route="{{ route('web.search.autocomplete') }}" 
                        type="text" 
                        name="search"
                        class="form-control border-right-0" 
                        placeholder="{{ trans('icore::search.search') }}"
                        value="{{ $search ?? null }}"
                        autocomplete="off"
                    >

  
                    <input type="hidden" name="source" value="dir">
                    <span class="input-group-append">
                        <button 
                            class="btn btn-outline-secondary border border-left-0"
                            type="submit" {{ isset($search) ?: 'disabled' }}
                        >
                            <i class="fa fa-search lupka-{{ config('app.name_short') }}"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="my-auto">
                <ul class="navbar-nav">
                    <li class="nav-item d-sm-inline d-md-none ml-2">
                        @yield('search-toggler')
                    </li>
                </ul>
            </div>
            @yield('navbar-toggler')
        </div>



        <div class="navbar-collapse scroll collapse flex-grow-0 justify-content-end">
            @render('icore::page.menuComponent', [
                'limit' => 0
            ])
            <ul class="navbar-nav pr-3 pr-md-0">

                <li class="nav-item d-none d-md-inline mr-1">
                    @yield('search-toggler')
                </li>

                @if (app('router')->has('web.dir.create_1'))
                <li class="nav-item mr-sm-0 mr-md-2 mb-2 mb-md-0">
                    <a 
                        class="btn btn-bd-download reg up 
						 
						

						
						"
                        href="{{ route('web.dir.create_1') }}" 
                        role="button"
                    ><i class="fas fa-fw fa-plus"></i>
                        {{ trans('idir::dirs.route.create.index') }}
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown {{ $isRouteContains('profile') }}">
                    @auth
                    <a 
                        class="btn btn-outline-light up reg" 
                        href="#" 
                        role="button" 
                        id="navbarDropdownMenuProfile"
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false"
                    >
                        <i class="fas fa-fw fa-lg fa-user-circle"></i>
                        <span class="d-md-none d-lg-inline">{{ auth()->user()->short_name }}</span>
                    </a>
                    <div 
                        class="dropdown-menu dropdown-menu-right" 
                        aria-labelledby="navbarDropdownMenuProfile"
                    >
                        <h6 class="dropdown-header">
                            {{ trans('icore::auth.hello')}}, {{ auth()->user()->name }}
                        </h6>
                        <a 
                            class="dropdown-item {{ $isUrl(route('web.profile.edit')) }}" 
                            href="{{ route('web.profile.edit') }}" 
                            title="{{ trans('icore::profile.route.edit') }}"
                        >
                            {{ trans('icore::profile.route.index') }}
                        </a>
                        @can('admin.home.view')
                        <a 
                            class="dropdown-item" 
                            href="{{ route('admin.home.index') }}" 
                            title="{{ trans('icore::admin.route.index') }}"
                        >
                            {{ trans('icore::admin.route.index') }}
                        </a>
                        @endcan
                        <div class="dropdown-divider"></div>
                        <a 
                            class="dropdown-item" 
                            href="{{ route('logout') }}"
                            title="{{ trans('icore::auth.route.logout') }}"
                        >
                            {{ trans('icore::auth.route.logout') }}
                        </a>
                    </div>
                    @else
                    <a 
                        class="btn btn-outline-light up reg" 
                        href="{{ route('login') }}" 
                        role="button" 
                        title="{{ trans('icore::auth.route.login') }}"
                    ><i class="far fa-fw fa-lg fa-user-circle"></i>
                        {{ trans('icore::auth.route.login') }}
                    </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="menu-height"></div>
