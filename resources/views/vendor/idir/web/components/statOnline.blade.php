@if ($countUsers)
&nbsp;<b>1{{ $countUsers->firstWhere('type', 'guest')->count ?? 0 }}</b> online, 
@endif
<br />
@if ($lastActivity)
Aktualizacja: <b>{{ now()->parse($lastActivity)->diffForHumans() }}</b><br />
@endif