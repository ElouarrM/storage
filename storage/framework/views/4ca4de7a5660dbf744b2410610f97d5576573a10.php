<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" /> 
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
<div class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default z-depth-4">
                    <div class="panel-heading"><?php echo e(__('public_pages.reset_pass')); ?></div>
                    <div class="panel-body">
                        <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label"><?php echo e(__('public_pages.email_addr')); ?></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('public_pages.send_reset_link')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/mdb.min.js')); ?>" type="text/javascript"></script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_login_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>