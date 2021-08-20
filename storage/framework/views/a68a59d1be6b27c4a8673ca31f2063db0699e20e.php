<div class="form-group">
    <div class="captcha g-recaptcha" data-sitekey="<?php echo e($site_key); ?>"></div>
    <?php echo $__env->renderWhen($errors->has('g-recaptcha-response'), 'icore::web.partials.errors', ['name' => 'g-recaptcha-response'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</div>

<?php if(!isset($__env->__pushonce_script_captcha)): $__env->__pushonce_script_captcha = true; $__env->startPush('script'); ?>
<script defer src="https://www.google.com/recaptcha/api.js"></script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/components/captcha/recaptcha_v2.blade.php ENDPATH**/ ?>