<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active" aria-current="page">
    <?php echo e(trans('icore::contact.route.show')); ?>

</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-7 ramka2 rounded">
            <?php echo $__env->make('icore::web.partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form method="post" action="<?php echo e(url()->current()); ?>" id="contact">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email">
                        <?php echo e(trans('icore::contact.address.label')); ?>

                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="<?php echo e(old('email', auth()->user()->email ?? null)); ?>"
                        class="form-control <?php echo e($isValid('email')); ?>"
                        placeholder="<?php echo e(trans('icore::contact.address.placeholder')); ?>"
                    >
                    <?php echo $__env->renderWhen($errors->has('email'), 'icore::web.partials.errors', ['name' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                </div>
                <div class="form-group">
                    <label for="title">
                        <?php echo e(trans('icore::contact.title.label')); ?>

                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="<?php echo e(old('title')); ?>"
                        class="form-control <?php echo e($isValid('title')); ?>"
                        placeholder="<?php echo e(trans('icore::contact.title.placeholder')); ?>"
                    >
                    <?php echo $__env->renderWhen($errors->has('title'), 'icore::web.partials.errors', ['name' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                </div>
                <div class="form-group">
                    <label for="content">
                        <?php echo e(trans('icore::contact.content')); ?>

                    </label>
                    <textarea 
                        name="content" 
                        id="content"
                        class="form-control <?php echo e($isValid('content')); ?>"
                        rows="3"
                    ><?php echo e(old('content')); ?></textarea>
                    <?php echo $__env->renderWhen($errors->has('content'), 'icore::web.partials.errors', ['name' => 'content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input 
                            type="checkbox" 
                            class="custom-control-input <?php echo e($isValid('contact_agreement')); ?>" 
                            id="contact_agreement" 
                            name="contact_agreement" 
                            value="1"
                            <?php echo e(old('contact_agreement') == true ? 'checked' : null); ?>

                        >
                        <label class="custom-control-label text-left" for="contact_agreement">
                            <small><?php echo e(trans('icore::policy.agreement.contact')); ?></small>
                        </label>
                    </div>
                    <?php echo $__env->renderWhen($errors->has('contact_agreement'), 'icore::web.partials.errors', ['name' => 'contact_agreement'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                </div>
                <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('icore::captchaComponent'), [])->toHtml(); ?>
                <button type="submit" class="btn btn-primary btn-send">
                    <?php echo e(trans('icore::default.submit')); ?>

                </button>
            </form>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-4 ramka2 rounded">
            <h3 class="h5">
                <?php echo e(trans('icore::contact.details')); ?>:
            </h3>
            <p>
                <a href="https://alg.pl" target="_blank" rel="nofollow"><b>ALG.PL</b></a><br />
                tel. <a href="tel:+48913334444">91 333 4444</a><br />
                sms. <a href="tel:+48501805005">501 805 005</a><br />
                e-mail: pomoc@alg.pl<br />
            </p>
            <div>
                <?php echo app(app(Spatie\ViewComponents\ComponentFinder::class)->find('icore::map.mapComponent'), [
                    'address_marker' => ['Szczecin']
                ])->toHtml(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->startComponent('icore::web.partials.jsvalidation'); ?>
<?php echo JsValidator::formRequest('N1ebieski\ICore\Http\Requests\Web\Contact\SendRequest', '#contact');; ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(config('icore.layout') . '::web.layouts.layout', [
    'title' => [trans('icore::contact.route.show')],
    'desc' => [trans('icore::contact.route.show')],
    'keys' => [trans('icore::contact.route.show')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/web/contact/show.blade.php ENDPATH**/ ?>