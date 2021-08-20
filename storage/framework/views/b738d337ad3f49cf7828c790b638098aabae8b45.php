<div 
    id="<?php echo e($selector); ?>"
    data-coords="<?php echo e($coords); ?>" 
    data-container-class="<?php echo e($containerClass); ?>"
    data-address-marker="<?php echo e($addressMarker ?? null); ?>" 
    data-zoom="<?php echo e($zoom); ?>"
    data-coords-marker="<?php echo e($coordsMarker ?? null); ?>"
></div>

<?php if(!isset($__env->__pushonce_script_map)): $__env->__pushonce_script_map = true; $__env->startPush('script'); ?>
<script defer 
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.googlemap.api_key')); ?>&callback=initMap" 
    type="text/javascript"
></script>
<?php $__env->stopPush(); endif; ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/idir/web/components/map/dir/map.blade.php ENDPATH**/ ?>