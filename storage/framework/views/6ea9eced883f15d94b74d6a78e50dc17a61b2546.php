<?php $__env->startSection('content'); ?>
<div class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title">
                    <h2><?php echo e(__('public_pages.payment_type')); ?></h2>
                </div>
                <div class="payment-types" style="display: flex;gap:10px;">
                    <div class="box-type active" data-radio-val="cash_on_delivery">
                        <img src="<?php echo e(asset('img/cash_on_deliv.png')); ?>" alt="econt" class="img-responsive">
                        <span><?php echo e(__('public_pages.cash_on_delivery')); ?></span>
                    </div>
                    <div class="box-type" data-radio-val="card" style="pointer-events: none;">
                        <img src="<?php echo e(asset('img/cards.png')); ?>" alt="econt" class="img-responsive" style="filter: grayscale(100%);">
                        <span>credit card (Soon)</span>
                    </div>
                    <div class="box-type" data-radio-val="paypal" style="pointer-events: none;">
                        <img src="<?php echo e(asset('img/paypal.png')); ?>" alt="econt" class="img-responsive" style="filter: grayscale(100%);">
                        <span>Paypal (Soon)</span>
                    </div>
                </div>
                <div class="section-title">
                    <h2><?php echo e(__('public_pages.delivery_address')); ?></h2>
                </div>
                <div id="errors" class="alert alert-danger"></div>
                <form method="POST" action="<?php echo e(lang_url('checkout')); ?>" id="set-order"> 
                    <?php echo e(csrf_field()); ?>

                    <div class="radios">
                        <input type="radio" checked="" name="payment_type" value="cash_on_delivery">
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <input class="form-control" name="name" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->name); ?> <?php endif; ?>" type="text" placeholder="<?php echo e(__('public_pages.name')); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" name="email" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->email); ?> <?php endif; ?>" type="text" placeholder="<?php echo e(__('public_pages.email_address')); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" name="phone" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->phone); ?> <?php endif; ?>" type="text" placeholder="<?php echo e(__('public_pages.phone')); ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <textarea name="address" placeholder="<?php echo e(__('public_pages.address')); ?>" class="form-control" rows="3"><?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->address); ?> <?php endif; ?></textarea>
                        </div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" name="city" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->city); ?> <?php endif; ?>" type="text" placeholder="<?php echo e(__('public_pages.city')); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input class="form-control" name="post_code" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->post_code); ?> <?php endif; ?>" type="text" placeholder="<?php echo e(__('public_pages.post_code')); ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <textarea class="form-control" placeholder="<?php echo e(__('public_pages.notes')); ?>" name="notes" rows="3"></textarea>
                        </div>
                    </div>
                    <?php
                    $sum = $sum_total = 0;
                    if(!empty($cartProducts)) {
                    $sum = 0;
                    ?>
                    <div class="products-for-checkout">
                        <ul>
                            <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $sum_total += $cartProduct->num_added * (float)$cartProduct->price;
                            $sum = $cartProduct->num_added * (float)$cartProduct->price;
                            ?>
                            <li>
                                <input name="id[]" value="<?php echo e($cartProduct->id); ?>" type="hidden">
                                <input name="quantity[]" value="<?php echo e($cartProduct->num_added); ?>" type="hidden">
                                <a href="<?php echo e(lang_url($cartProduct->url)); ?>" class="link">                                        
                                    <img src="<?php echo e(asset('storage/'.$cartProduct->image)); ?>" alt="">
                                    <div class="info">
                                        <span class="name"><?php echo e($cartProduct->name); ?></span>
                                        <span class="price">
                                            <?php echo e($cartProduct->num_added); ?> x <?php echo e($cartProduct->price); ?> = <?php echo e($sum); ?>

                                        </span> 
                                    </div>
                                </a>
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" onclick="removeQuantity(<?php echo e($cartProduct->id); ?>)" class="btn btn-default">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant" disabled="" class="form-control" value="<?php echo e($cartProduct->num_added); ?>">
                                        <span class="input-group-btn">
                                            <button type="button" onclick="addProduct(<?php echo e($cartProduct->id); ?>)" class="btn btn-default">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="removeProduct" onclick="removeProduct(<?php echo e($cartProduct->id); ?>)">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <div class="clearfix"></div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="final-total"><?php echo e(__('public_pages.sum_for_pay')); ?> <?php echo e($sum_total); ?></div>
                    </div>
                    <a href="javascript:void(0);" onclick="completeOrder()" class="green-btn"><?php echo e(__('public_pages.complete_order')); ?></a>
                    <?php
                    } else {
                    ?> 
                    <a href="<?php echo e(lang_url('products')); ?>" class="green-btn"><?php echo e(__('public_pages.first_need_add_products')); ?></a>
                    <?php 
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/publics/checkout.blade.php ENDPATH**/ ?>