<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(__('admin_pages.login_form')); ?></title>   
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" /> 
        <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('css/adminCustom.css')); ?>" rel="stylesheet" /> 
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css" />
        <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/placeholders.min.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\Users\MOUNIR\Desktop\ecomm-pfe-master\resources\views/layouts/app_login_admin.blade.php ENDPATH**/ ?>