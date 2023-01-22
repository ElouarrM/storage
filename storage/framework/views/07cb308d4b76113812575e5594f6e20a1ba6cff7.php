<?php $__env->startSection('content'); ?>
<div class="product-preview">
    <div class="container">
        <div class="row first-part">
            <div class="col-sm-6">
                <div class="product-title visible-xs">
                    <h1><?php echo e($product->name); ?></h1>
                </div>
                <div id="inner-slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" data-num="0" class="img-responsive img-thumbnail" alt="<?php echo e($product->name); ?>">
                        </div>
                        <?php
                        if (!empty($gallery)) {
                            $i = 1;
                            foreach ($gallery as $image) {
                                ?>
                                <div class="item">
                                    <img src="<?php echo e($image); ?>"  data-num="<?php echo e($i); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($product->name); ?>">
                                </div>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                    </div>
                    <div class="controls">
                        <a class="left carousel-control" href="#inner-slider" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                        <a class="right carousel-control" href="#inner-slider" role="button" data-slide="next">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row hidden-xs">
                    <div class="col-xs-4 col-sm-6 col-md-4 text-center">
                        <a data-target="#inner-slider" class="active" data-slide-to="0" href="javascript:void(0)">
                            <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="img-thumbnail" alt="">
                        </a>
                    </div>
                    <?php
                    if (!empty($gallery)) {
                        $i = 1;
                        foreach ($gallery as $image) {
                            ?>
                            <div class="col-xs-4 col-sm-6 col-md-4 text-center">
                                <a data-target="#inner-slider" data-slide-to="<?php echo e($i); ?>" href="javascript:void(0)">
                                    <img src="<?php echo e($image); ?>" class="img-thumbnail" alt="">
                                </a>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="product-title hidden-xs">
                    <h1><?php echo e($product->name); ?></h1>
                </div>
                <div class="category">
                    <span><?php echo e(__('public_pages.category_name')); ?></span>
                    <a href="<?php echo e(lang_url('category/'.$product->category_url)); ?>" title="<?php echo e(__('public_pages.category_name')); ?> <?php echo e($product->category_name); ?>"><?php echo e($product->category_name); ?></a>
                </div>
                <div class="price">
                    <span class="detail"><?php echo e($product->price); ?></span>
                    <?php if($product->quantity > 0): ?>
                    <span class="label label-success"><?php echo e(__('public_pages.in_stock')); ?></span>
                    <?php else: ?>
                    <span class="label label-danger"><?php echo e(__('public_pages.out_of_stock')); ?></span>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
                <div class="buy">
                    <div class="quantity">
                        <span><?php echo e(__('public_pages.quantity')); ?></span>
                        <input type="text" class="field" name="quantity" value="1">
                    </div>
                    <?php
                    if($product->link_to != null) {
                    ?>
                    <a href="<?php echo e($product->link_to); ?>" class="buy-now"><?php echo e(__('public_pages.buy')); ?></a>
                    <?php
                    } else {
                    ?> 
                    <a href="javascript:void(0);" data-product-id="<?php echo e($product->id); ?>" class="buy-now to-cart">
                        <?php echo e(__('public_pages.buy')); ?>

                    </a>
                    <?php
                    }
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3><?php echo e(__('public_pages.details')); ?></h3>
                <div class="details">
                    <?php echo e($product->description); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/publics/preview.blade.php ENDPATH**/ ?>