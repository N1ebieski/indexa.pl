<?php if($countUsers): ?>
&nbsp;<b>1<?php echo e($countUsers->firstWhere('type', 'guest')->count ?? 0); ?></b> online, 
<?php endif; ?>
<br />
<?php if($lastActivity): ?>
Aktualizacja: <b><?php echo e(now()->parse($lastActivity)->diffForHumans()); ?></b><br />
<?php endif; ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/statOnline.blade.php ENDPATH**/ ?>