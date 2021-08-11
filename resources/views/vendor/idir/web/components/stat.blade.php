<span class="text-stat-{{ config('app.name_short') }}">
<h3 class="h4 card-title">Witamy w katalogu <span class="stat-domena-{{ config('app.name_short') }}">{{ config('app.name_short') }}</span></h5>
<hr>
<p class="card-text">
Katalog {{ config('app.name_short') }} zawiera @if ($countDirs->isNotEmpty()) <b>{{ $countDirs->firstWhere('status', 1)->count ?? 0 }}</b> aktywnych wpisów, w <b>{{ $countCategories->count ?? 0 }}</b> kategoriach.<br />



@endif
<br />
@if ($countUsers)
Obecnie w {{ config('app.name_short') }} przebywa <b>1{{ $countUsers->firstWhere('type', 'guest')->count ?? 0 }} </b>gości oraz <b>{{ $countUsers->firstWhere('type', 'user')->count ?? 0 }} </b>zalogowanych użytkowników, 
@endif
<br />
którzy napisali <b>{{ $countComments->sum('count') ?? 0 }} </b>komentarzy, za które serdecznie dziękujemy.
</p>

<small class="text-muted">Zapraszamy do <b><a href="/dodaj/1">dodawania</a></b> wpisów, a przed dodaniem, prosimy zapoznać się z naszym <b><a href="/info/regulamin" title="Nasz Regulamin" alt="Regulamin">Regulaminem</a></b>.</small>
</span>

