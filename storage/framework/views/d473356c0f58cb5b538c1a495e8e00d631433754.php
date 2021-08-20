<?php if(auth()->guard()->guest()): ?>
<?php if(!request()->cookie('policyAgree')): ?>
<div id="policy">
    <div class="policy-height"></div>
    <nav class="navbar policy fixed-bottom navbar-light bg-light border-top">
        <div class="navbar-text py-0">
            <small>
                <?php echo trans('icore::policy.info', [
                    'privacy' => route('web.page.show', [Str::slug(trans('icore::policy.privacy'))])
                ]); ?>

            </small>
        </div>
    </nav>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/partials/policy.blade.php ENDPATH**/ ?>