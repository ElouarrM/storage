<?php $__env->startSection('content'); ?>
<div class="contacts-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 section-title">
                <h2><?php echo e(__('public_pages.contacts')); ?></h2>
            </div>
            <div class="col-xs-12">
                <form method="POST" action="">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control" placeholder="<?php echo e(__('public_pages.client_email')); ?>" name="client_email">
                    <textarea class="form-control" placeholder="<?php echo e(__('public_pages.client_message')); ?>" name="client_message"></textarea>
                    <button type="submit" class="submit"><?php echo e(__('public_pages.send_message')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/publics/contacts.blade.php ENDPATH**/ ?>