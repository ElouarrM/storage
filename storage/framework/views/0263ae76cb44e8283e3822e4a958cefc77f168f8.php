<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>" rel="stylesheet" /> 
<div class="products-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="categories">
                    <h2><?php echo e(__('public_pages.categories')); ?></h2>
                    <?php 
                    function loop_tree($treeArr, $is_recursion = false, $selectedCategory)
                    { 
                    ?>
                    <ul class="<?php echo e($is_recursion === true ? 'children' : 'parent'); ?>">
                        <?php
                        foreach ($treeArr as $tree) {
                        $children = false;
                        if (isset($tree->children) && !empty($tree->children)) {
                        $children = true;
                        }
                        ?>
                        <li class="<?php echo e(isset($selectedCategory) && $selectedCategory == $tree->url ? 'active' : ''); ?>"> 
                            <a href="<?php echo e(lang_url('category/'.$tree->url)); ?>">
                                <?php echo e($tree->name); ?>

                                <span></span>
                            </a>
                            <?php if ($children === true) {
                            ?>
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </span>
                            <?php }
                            if ($children === true) {
                            loop_tree($tree->children, true, $selectedCategory);
                            } else {
                            ?>
                        </li>
                        <?php
                        }
                        }
                        ?>
                    </ul>
                    <?php
                    if ($is_recursion === true) {
                    ?>
                    </li>
                    <?php
                    }
                    }
                    ?>
                    <?php
                    loop_tree($categories, false, $selectedCategory);
                    ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-xs-12 section-title">
                        <h2><?php echo e(__('public_pages.all_products')); ?></h2>
                        <div class="dropdown dropdown-order">
                            <button class="btn btn-bordered dropdown-toggle" type="button" data-toggle="dropdown">
                                <?php
                                if(isset($_GET['order_by']) == 'created_at' && isset($_GET['type']) == 'asc'){
                                ?>
                                <?php echo e(__('public_pages.order_date_asc')); ?>

                                <?php
                                }
                                elseif(isset($_GET['order_by']) == 'created_at' && isset($_GET['type']) == 'desc'){                    
                                ?>
                                <?php echo e(__('public_pages.order_date_desc')); ?>

                                <?php
                                } else {
                                ?>
                                <?php echo e(__('public_pages.title_order')); ?>

                                <?php 
                                }
                                ?> 
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?order_by=created_at&type=asc"><?php echo e(__('public_pages.order_date_asc')); ?></a></li>
                                <li><a href="?order_by=created_at&type=desc"><?php echo e(__('public_pages.order_date_desc')); ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if(!$products->isEmpty()) {
                    ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-md-4 product-container">
                        <div class="product">
                            <div class="img-container">
                                <a href="<?php echo e(lang_url($product->url)); ?>">
                                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
                                </a>
                            </div>
                            <a href="<?php echo e(lang_url($product->url)); ?>">
                                <h1><?php echo e($product->name); ?></h1>
                            </a>
                            <span class="price"><?php echo e($product->price); ?></span>
                            <?php
                            if($product->link_to != null) {
                            ?>
                            <a href="<?php echo e(lang_url($product->url)); ?>" class="buy-now" title="<?php echo e($product->name); ?>"><?php echo e(__('public_pages.buy')); ?></a>
                            <?php
                            } else {
                            ?>
                            <a href="javascript:void(0);" data-product-id="<?php echo e($product->id); ?>" class="buy-now to-cart"><?php echo e(__('public_pages.buy')); ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    } else {
                    ?> 
                    <div class="col-xs-12">
                        <div class="alert alert-danger"><?php echo e(__('public_pages.no_products')); ?></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php echo e($products->links()); ?>

            </div>
        </div> 
    </div>
</div>
<script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/publics/products.blade.php ENDPATH**/ ?>