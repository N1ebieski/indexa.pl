

<?php $__env->startSection('content'); ?>
<div class="jumbotron jumbotron-fluid m-0 background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <h5 class="card-header">
                        <?php echo e(trans('icore::auth.route.login')); ?>

                    </h5>

                    <div class="card-body">
                        <?php echo $__env->make('icore::web.partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label 
                                    for="email" 
                                    class="col-lg-4 col-form-label text-lg-right"
                                >
                                    <?php echo e(trans('icore::auth.address.label')); ?>

                                </label>

                                <div class="col-lg-6">
                                    <input 
                                        id="email" 
                                        type="email" 
                                        class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" 
                                        name="email" 
                                        value="<?php echo e(old('email')); ?>" 
                                        required 
                                        autofocus
                                    >

                                    <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label 
                                    for="password" 
                                    class="col-lg-4 col-form-label text-lg-right"
                                >
                                    <?php echo e(trans('icore::auth.password')); ?>

                                </label>

                                <div class="col-lg-6">
                                    <input 
                                        id="password" 
                                        type="password" 
                                        class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" 
                                        name="password" 
                                        required
                                    >

                                    <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <div class="custom-control custom-checkbox">
                                        <input 
                                            class="custom-control-input" 
                                            type="checkbox" 
                                            name="remember" 
                                            id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                        >

                                        <label class="custom-control-label" for="remember">
                                            <?php echo e(trans('icore::auth.remember')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-lg-8 offset-lg-4">
                                    <input 
                                        type="hidden" 
                                        name="redirect" 
                                        value="<?php echo e(old('redirect', url()->previous() ?? null)); ?>"
                                    >

                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(trans('icore::auth.login')); ?>

                                    </button>

                                    <?php if(app('router')->has('password.request')): ?>
                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                            <?php echo e(trans('icore::auth.forgot')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>
                            <?php if(app('router')->has('register')): ?>
                            <div class="form-group row mb-0">
                                <div class="col-lg-8 offset-lg-4">
                                    <span class="mr-1">
                                        <?php echo e(trans('icore::auth.no_profile')); ?>

                                    </span>
                                    <a 
                                        class="btn btn-outline-primary" 
                                        href="<?php echo e(route('register')); ?>"
                                        title="<?php echo e(trans('icore::auth.register')); ?>"
                                    >
                                        <?php echo e(trans('icore::auth.register')); ?>

                                    </a>
                                </div>
                            </div>
                            <?php if(app('router')->has('auth.socialite.redirect')): ?>
                            <hr>
                            <div class="form-group row mb-0">
                                <div class="col-lg-8 offset-lg-4">
                                    <p>
                                        <span class="mr-1">
                                            <?php echo e(trans('icore::auth.login_with')); ?>:
                                        </span>
                                        <span>
                                            <a 
                                                href="<?php echo e(route('auth.socialite.redirect', ['provider' => 'facebook'])); ?>" 
                                                class="mr-2" 
                                                title="Facebook"
                                            >
                                                <i class="fab fa-facebook"></i>
                                                <span> Facebook</span>
                                            </a>
                                            <a 
                                                href="<?php echo e(route('auth.socialite.redirect', ['provider' => 'twitter'])); ?>" 
                                                class="mr-2" 
                                                title="Twitter"
                                            >
                                                <i class="fab fa-twitter"></i> 
                                                <span> Twitter</span>
                                            </a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('icore.layout') . '::web.layouts.layout', [
    'title' => [trans('icore::auth.route.login')],
    'desc' => [trans('icore::auth.route.login')],
    'keys' => [trans('icore::auth.route.login')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/srv38307/domains/indexa.pl/resources/views/vendor/icore/auth/login.blade.php ENDPATH**/ ?>