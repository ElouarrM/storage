<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
        <meta name="description" content="<?php echo e($head_description); ?>"/>
        <meta property="og:title" content="<?php echo e($head_title); ?>" />
        <meta property="og:description" content="<?php echo e($head_description); ?>" />
        <meta property="og:url" content="<?php echo e(urldecode(url()->current())); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?php echo e(isset($product->image) ? asset('storage/'.$product->image) : asset('storage/ExtractiLogo.png')); ?>" />
        <title><?php echo e($head_title); ?></title>
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
        <link href="<?php echo e(asset('css/public.css')); ?>" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row top-part">
                    <div class="col-sm-3 col-md-3">
                        <a href="<?php echo e(lang_url('/')); ?>" class="logo-container">
                            <img src="<?php echo e(asset('storage/images/logo.png')); ?>" sizes="30%" class="img-responsive logo" alt="<?php echo e($head_title); ?>">
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-4">
                        <form class="search" id="products-search" action="<?php echo e(lang_url('products')); ?>" method="GET">
                            <input type="text" name="find" class="search-field" value="<?php echo e(Request::get('find')); ?>" placeholder="<?php echo e(__('public_pages.search')); ?>">
                            <a href="javascript:void(0);" class="submit-search" onclick=" document.getElementById('products-search').submit();">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </form>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <div class="phone-call">
                          
                            <div class="right">
                                <p><?php echo e(__('public_pages.phone_order')); ?></p>
                                <span>05 24 83 90 20</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3" style="display: inline-flex;justify-content: right;align-items: center;gap: 20px;">
                        <div class="user">
                            <a href="javascript:void(0);" class="cart-button">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                <span class="badge"><?php echo e(!empty($cartProducts) ? count($cartProducts): 0); ?></span>
                            </a>
                        </div>
                        <div class="user">
                            <?php if(auth()->guard()->check()): ?>
                                <p style="color:#3d5fcc;display:inline;">Hi! <?php echo e(Auth::user()->name); ?></p>
                                <span style="color:#3d5fcc;">|</span>
                                <a href="<?php echo e(url('logout')); ?>" style="font-size: 15px;">Logout</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" style="font-size: 15px;">Login</a>
                                <span style="font-size: 16px;color:#8ec63f;">|</span>
                                <a href="<?php echo e(route('register')); ?>" style="font-size: 15px;">Register</a>
                            <?php endif; ?>
                        </div>
                        <div class="cart-fast-view-container">
                            <?php
                            $sum = 0;
                            if(!empty($cartProducts)) {
                            $sum = 0;
                            ?>
                            <div class="cart-products-fast-view">
                                <div class="content">
                                    <a href="javascript:void(0);" class="close-me" onclick="closeFastCartView()">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                    <ul>
                                        <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $sum += $cartProduct->num_added * (int)$cartProduct->price;
                                        ?>
                                        <li>
                                            <a href="<?php echo e(lang_url($cartProduct->url)); ?>" class="link">                                        
                                                <img src="<?php echo e(asset('storage/'.$cartProduct->image)); ?>" alt="">
                                                <span class="name"><?php echo e($cartProduct->name); ?></span>
                                                <span class="price">
                                                    <?php echo e($cartProduct->num_added); ?> x <?php echo e($cartProduct->price); ?>

                                                </span>
                                            </a>
                                            <a href="javascript:void(0);" class="removeQantity" onclick="removeQuantity(<?php echo e($cartProduct->id); ?>)">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="pay-sum">
                                        <span class="text"><?php echo e(__('public_pages.subtotal')); ?></span>
                                        <span class="sum"><?php echo e($sum); ?></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <a href="<?php echo e(lang_url('checkout')); ?>" class="green-btn"><?php echo e(__('public_pages.payment')); ?></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-custom">
                <div class="container">
                    <button type="button" class="navbar-toggle collapsed show-right-menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <a class="navbar-brand visible-xs" href="#"><?php echo e(__('public_pages.menu')); ?></a>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-center">
                            <li><a href="<?php echo e(lang_url('products')); ?>"><?php echo e(__('public_pages.products')); ?></a></li>
                            <li><a href="<?php echo e(lang_url('checkout')); ?>"><?php echo e(__('public_pages.checkout')); ?></a></li>
                            <li><a href="<?php echo e(lang_url('contacts')); ?>"><?php echo e(__('public_pages.contacts')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
        <footer>
            <div class="social">
                <a href=""><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i></a>
            </div>
            <div class="pages">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-8">
                            <ul>
                                <li class="header">ABOUT  US :</li>
                                <li><a href="" target="_blank">Company Info</a> We are the leading Amazon FBA Agency and eCommerce 

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-8">
                            <ul>
                                <li class="header">ABOUT  US :</li>
                                <li><a href="" target="_blank">Company Info</a> We are the leading Amazon FBA Agency and eCommerce 

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-8">
                            <ul>
                                <li class="header">ABOUT  US :</li>
                                <li><a href="" target="_blank">Company Info</a> We are the leading Amazon FBA Agency and eCommerce 

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-rights">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            Copyright <?php echo e(date('Y')); ?> HAMZA
                        </div>
                        <div class="col-sm-6 text-right">
                            All rights are reserved &copy; <?php echo e(date('Y')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="fast-order hidden-xs">
            <div class="inner">
                <h2><?php echo e(__('public_pages.fast_order')); ?></h2>
                <form method="POST" id="go-fast-order" action="<?php echo e(lang_url('fast-order')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="phone-user"><?php echo e(__('public_pages.phone')); ?></label>
                        <input type="text" name="fast_phone" class="form-control" placeholder="0888 888 888" id="phone-user">
                        <span class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                    </div>
                    <div class="form-group">
                        <label for="names-user"><?php echo e(__('public_pages.names')); ?></label>
                        <input type="text" name="fast_names" class="form-control" placeholder="<?php echo e(__('public_pages.name_and_family')); ?>" id="names-user">
                        <span class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                    </div>
                    <p><?php echo e(__('public_pages.we_will_contact_u')); ?></p>
                    <a href="javascript:void(0);" class="submit">
                        <?php echo e(__('public_pages.fast_order')); ?>

                    </a>
                </form>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
        </div>
        <a class="fast-order-btn visible-xs">
            <?php echo e(__('public_pages.fast_order')); ?>

        </a>
        <div class="backdrop"></div>
        <div class="right-menu">
            <ul>
                <li><a href="<?php echo e(lang_url('products')); ?>"><?php echo e(__('public_pages.products')); ?></a></li>
                <li><a href="<?php echo e(lang_url('checkout')); ?>"><?php echo e(__('public_pages.checkout')); ?></a></li>
                <li><a href="<?php echo e(lang_url('contacts')); ?>"><?php echo e(__('public_pages.contacts')); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo e(app()->getLocale()); ?>

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-xs" role="menu">
                        <?php $__currentLoopData = Config::get('app.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url(getSameUrlInOtherLang($locale))); ?>"><?php echo e($locale); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            </ul>
            <a href="javascript:void(0);" class="close-xs-menu"><?php echo e(__('public_pages.close_xs_menu')); ?></a>
        </div> 
        <!-- Modal After buy now button -->
        <div class="modal fade" id="modalBuyBtn" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4><?php echo e(__('public_pages.success_add_to_cart')); ?></h4>
                        <a href="<?php echo e(lang_url('checkout')); ?>" class="go-buy"><?php echo e(__('public_pages.go_buy')); ?></a>
                        <hr>
                        <div class="continue-shopping">
                            <a href="javascript:void(0);" data-dismiss="modal">
                                <?php echo e(__('public_pages.continue_shopping')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session('msg')): ?>
        <div class="alert <?php echo e(session('result') === true ? "alert-success" : "alert-danger"); ?> alert-top">  
            <?php if(is_array(session('msg'))): ?>
            <?php echo implode('<br>',session('msg')); ?>

            <?php else: ?>
            <?php echo e(session('msg')); ?>

            <?php endif; ?>
        </div>
        <?php endif; ?>
        <script>
            var urls = {
            addProduct: "<?php echo e(url('addProduct')); ?>",
                    removeProductQuantity: "<?php echo e(url('removeProductQuantity')); ?>",
                    getProducts: "<?php echo e(url('getGartProducts')); ?>",
                    getProductsForCheckoutPage: "<?php echo e(url('getProductsForCheckoutPage')); ?>",
                    removeProduct: "<?php echo e(url('removeProduct')); ?>"
            };
            var variables = {
            addressReq: "<?php echo e(__('public_pages.address_field_req')); ?>",
                    phoneReq: "<?php echo e(__('public_pages.phone_field_req')); ?>",
                    productsReq: "<?php echo e(__('public_pages.productsReq')); ?>"
            };
        </script>
        <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-ui-1.12.1/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/placeholders.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/public.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\Users\MOUNIR\Desktop\ecomm-pfe-master\resources\views/layouts/app_public.blade.php ENDPATH**/ ?>