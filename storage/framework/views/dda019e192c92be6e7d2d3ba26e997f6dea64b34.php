<div 
    id="map" 
    data-container-class="<?php echo e($containerClass); ?>"
    data-address-marker="<?php echo e($addressMarker); ?>" 
    data-zoom="<?php echo e($zoom); ?>"
></div>

<?php $__env->startPush('script'); ?>
<script 
    defer 
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.googlemap.api_key')); ?>&callback=initMap" 
    type="text/javascript"
></script>
<?php $__env->stopPush(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/components/map/map.blade.php ENDPATH**/ ?>