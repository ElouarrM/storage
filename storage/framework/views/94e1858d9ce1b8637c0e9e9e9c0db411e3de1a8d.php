<?php $__env->startSection('content'); ?>

<div class="home-page">

    <?php if(count($carousel)): ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $i=0;
                ?>
                <?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i == 0 ? 'active' : ''); ?>"></li>
                <?php
                $i++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $i=0;
                ?>
                <?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php echo e($i == 0 ? 'active' : ''); ?>">
                    <a href="<?php echo e($slide->link); ?>">
                        <img src="<?php echo e(asset('storage/'.$slide->image)); ?>" alt="">
                    </a>
                </div>
                <?php
                $i++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
        </div>
    <?php endif; ?>

    <div class="container">

        <?php if(is_array($carousel) && count($carousel)): ?>
            <div class="row promo">
                <div class="col-xs-12 section-title">
                    <h2><?php echo e(__('public_pages.promo_products')); ?></h2>
                </div>
                <?php $__currentLoopData = $promoProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-6 col-sm-4 col-md-3 product-container">
                    <div class="product">
                        <div class="img-container">
                            <a href="<?php echo e(lang_url($promoProduct->url)); ?>">
                                <img src="<?php echo e(asset('storage/'.$promoProduct->image)); ?>" alt="<?php echo e($promoProduct->name); ?>">
                            </a>
                        </div>
                        <a href="<?php echo e(lang_url($promoProduct->url)); ?>">
                            <h1><?php echo e($promoProduct->name); ?></h1>
                        </a>
                        <span class="price"><?php echo e($promoProduct->price); ?></span>
                        <?php
                        if($promoProduct->link_to != null) {
                        ?>
                            <a href="<?php echo e(lang_url($promoProduct->url)); ?>" class="buy-now" title="<?php echo e($promoProduct->name); ?>"><?php echo e(__('public_pages.buy')); ?></a>
                        <?php
                        } else {
                        ?>
                            <a href="javascript:void(0);" data-product-id="<?php echo e($promoProduct->id); ?>" class="buy-now to-cart"><?php echo e(__('public_pages.buy')); ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="row <?php echo e(!count($carousel) ? "mt-4" : ""); ?>">
            <div class="col-xs-12 section-title">
                <h2><?php echo e(__('public_pages.most_selled')); ?></h2>
            </div>
            <?php $__currentLoopData = $mostSelledProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostSelledProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-6 col-sm-4 col-md-3 product-container">
                <div class="product">
                    <div class="img-container">
                        <a href="<?php echo e(lang_url($mostSelledProduct->url)); ?>">
                            <img src="<?php echo e(asset('storage/'.$mostSelledProduct->image)); ?>" alt="<?php echo e($mostSelledProduct->name); ?>">
                        </a>
                    </div>
                    <a href="<?php echo e(lang_url($mostSelledProduct->url)); ?>">
                        <h1><?php echo e($mostSelledProduct->name); ?></h1>
                    </a>
                    <span class="price"><?php echo e($mostSelledProduct->price); ?></span>
                    <?php
                    if($mostSelledProduct->link_to != null) {
                    ?>
                    <a href="<?php echo e(lang_url($mostSelledProduct->url)); ?>" class="buy-now" title="<?php echo e($mostSelledProduct->name); ?>"><?php echo e(__('public_pages.buy')); ?></a>
                    <?php
                    } else {
                    ?>
                    <a href="javascript:void(0);" data-product-id="<?php echo e($mostSelledProduct->id); ?>" class="buy-now to-cart"><?php echo e(__('public_pages.buy')); ?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(!count($carousel)): ?>
                <?php echo e(__('public_pages.no_products')); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/publics/home.blade.php ENDPATH**/ ?>