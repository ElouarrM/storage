<?php $__env->startSection('content'); ?>
<div class="row">
    <?php
    if(!$products->isEmpty()) {
    ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 col-lg-3">
        <div class="card card-cascade narrower hm-zoom">
            <div class="view overlay hm-white-slight">
                <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="img-fluid" alt="<?php echo e(__('admin_pages.no_choosed_image')); ?>">
                <a>
                    <div class="mask"></div>
                </a>
            </div>
            <div class="card-body text-center no-padding">
                <h4 class="card-title"><strong><a href=""><?php echo e($product->name); ?></a></strong></h4>
                <p class="card-text">
                    <?php echo e(strip_tags($product->description)); ?>

                </p>
                <div class="card-footer">
                    <div class="text-center price"><?php echo e($product->price); ?></div>
                    <span class="right">
                        <a href="<?php echo e(lang_url('admin/edit/pruduct/'.$product->id)); ?>" class="btn btn-secondary btn-sm">
                            <?php echo e(__('admin_pages.edit')); ?>

                        </a>
                        <a href="<?php echo e(lang_url('admin/delete/product/'.$product->id)); ?>" data-my-message="<?php echo e(__('admin_pages.are_u_sure_delete')); ?>" class="btn btn-secondary btn-sm confirm">
                            <?php echo e(__('admin_pages.delete')); ?>

                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php
    } else {
    ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo e(__('admin_pages.no_product_results')); ?></div>
    </div>
    <?php
    }
    ?>
</div>
<?php echo e($products->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/products.blade.php ENDPATH**/ ?>