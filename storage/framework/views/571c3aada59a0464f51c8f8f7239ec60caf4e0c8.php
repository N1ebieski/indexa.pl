<span class="text-stat-<?php echo e(config('app.name_short')); ?>">
<h3 class="h4 card-title">Witamy w katalogu <span class="stat-domena-<?php echo e(config('app.name_short')); ?>"><?php echo e(config('app.name_short')); ?></span></h5>
<hr>
<p class="card-text">
Katalog <?php echo e(config('app.name_short')); ?> zawiera <?php if($countDirs->isNotEmpty()): ?> <b><?php echo e($countDirs->firstWhere('status', 1)->count ?? 0); ?></b> aktywnych wpisów, w <b><?php echo e($countCategories->count ?? 0); ?></b> kategoriach.<br />



<?php endif; ?>
<br />
<?php if($countUsers): ?>
Obecnie w <?php echo e(config('app.name_short')); ?> przebywa <b>1<?php echo e($countUsers->firstWhere('type', 'guest')->count ?? 0); ?> </b>gości oraz <b><?php echo e($countUsers->firstWhere('type', 'user')->count ?? 0); ?> </b>zalogowanych użytkowników, 
<?php endif; ?>
<br />
którzy napisali <b><?php echo e($countComments->sum('count') ?? 0); ?> </b>komentarzy, za które serdecznie dziękujemy.
</p>

<small class="text-muted">Zapraszamy do <b><a href="/dodaj/1">dodawania</a></b> wpisów, a przed dodaniem, prosimy zapoznać się z naszym <b><a href="/info/regulamin" title="Nasz Regulamin" alt="Regulamin">Regulaminem</a></b>.</small>
</span>

<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/stat.blade.php ENDPATH**/ ?>