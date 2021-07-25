<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>
</div>

		
		
		<h3 class="h4 card-title">Witamy w katalogu <b>{{ config('app.name') }}</b></h5>
<hr>
        <p class="card-text">
Katalog zawiera @if ($countDirs->isNotEmpty()) <b>{{ $countDirs->firstWhere('status', 1)->count ?? 0 }} aktywnych wpisów</b>, w <b>{{ $countCategories->count ?? 0 }} kategoriach.</b><br />
Kolejka oczekujących na dodanie wynosi: <b>{{ $countDirs->firstWhere('status', 0)->count ?? 0 }}</b> szt. 
@endif
@if ($lastActivity)
a <b>{{ now()->parse($lastActivity)->diffForHumans() }}</b> dodano nowe wpisy.<br />
@endif
@if ($countUsers)
Obecnie w serwisie przebywa <b>{{ $countUsers->firstWhere('type', 'user')->count ?? 0 }} zalogowanych Użytkowników</b> oraz <b>{{ $countUsers->firstWhere('type', 'guest')->count ?? 0 }} Gości, 
@endif
</b> którzy napisali <b>{{ $countComments->sum('count') ?? 0 }} komentarzy</b>, za które serdecznie dziękujemy.
</p>

<small class="text-muted">Zapraszamy do <a href="/create/1">dodawania</a> wpisów, a przed dodaniem prosimy zapoznać się z naszym <a href="/create/1">Regulaminem</a>.</small>
