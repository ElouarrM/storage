<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(__('admin_pages.admin_panel_title').$page_title_lang); ?></title>   
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" /> 
        <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('css/adminCustom.css')); ?>" rel="stylesheet" /> 
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css' />
        <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-2 left-side">
                            <div class="menu-logo">
                                <a href="">
                                    <?php echo e(__('admin_pages.admin_panel')); ?>

                                </a>
                            </div>
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo e(lang_url('admin')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">dashboard</i>
                                        <p><?php echo e(__('admin_pages.dashboard')); ?></p>
                                    </a> 
                                </li>
                                <li>
                                    <a href="<?php echo e(lang_url('admin/publish')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">add_circle_outline</i>
                                        <p><?php echo e(__('admin_pages.publish')); ?></p>
                                    </a> 
                                </li>
                                <li>
                                    <a href="<?php echo e(lang_url('admin/products')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">list</i>
                                        <p><?php echo e(__('admin_pages.products')); ?></p>
                                    </a> 
                                </li> 
                                <li>
                                    <a href="<?php echo e(lang_url('admin/categories')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">star_rate</i>
                                        <p><?php echo e(__('admin_pages.categories')); ?></p>
                                    </a> 
                                </li>
                                <li>
                                    <a href="<?php echo e(lang_url('admin/orders')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">shopping_basket</i>
                                        <p><?php echo e(__('admin_pages.orders')); ?></p>
                                    </a> 
                                </li>
                                <li>
                                    <a href="<?php echo e(lang_url('admin/carousel')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">view_carousel</i>
                                        <p><?php echo e(__('admin_pages.carousel')); ?></p>
                                    </a> 
                                </li>
                                <li>
                                    <a href="<?php echo e(lang_url('admin/users')); ?>" class="btn waves-effect waves-light">
                                        <i class="material-icons">group</i>
                                        <p><?php echo e(__('admin_pages.users')); ?></p>
                                    </a> 
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-10 col-sm-offset-3 col-md-offset-3 col-lg-offset-2 right-side">
                            <nav class="navbar">
                                <div class="navbar-header">
                                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <i class="fa fa-lg fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="#"><?php echo e($page_title_lang); ?></a>
                                </div>
                                <div id="navbar" class="collapse navbar-collapse"> 
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="<?php echo e(url('logout')); ?>"> 
                                                <?php echo e(__('admin_pages.logout')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                    <form class="navbar-form navbar-right nav-bar-search" action="<?php echo e(lang_url('admin/products')); ?>" role="search">
                                        <div class="form-group is-empty waves-light waves-effect waves-light">
                                            <input class="form-control" placeholder="<?php echo e(__('admin_pages.search_product')); ?>" value="<?php echo e(Request::get('search')); ?>" name="search" type="text">
                                            <span class="material-input"></span>
                                            <span class="material-input"></span>
                                        </div>
                                        <button class="btn btn-white btn-round" type="submit">
                                            <i class="material-icons">search</i> 
                                        </button>
                                    </form>
                                    <div class="navbar-right">
                                    </div>
                                </div>
                            </nav>
                            <button type="button" class="btn purple-gradient btn-sm menu-btn-xs"><?php echo e(__('admin_pages.show_mine_menu')); ?></button>
                            <div class="right-side-wrapper">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <footer>
                <div class="row"> 
                    <div class="col-sm-9 col-md-9 col-lg-10 col-sm-offset-3 col-md-offset-3 col-lg-offset-2">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo e(lang_url('admin/publish')); ?>">
                                    <?php echo e(__('admin_pages.publish')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(lang_url('admin/products')); ?>">
                                    <?php echo e(__('admin_pages.products')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(lang_url('admin/categories')); ?>">
                                    <?php echo e(__('admin_pages.categories')); ?>

                                </a>
                            </li>
                            <li class="in-right">
                                <a href="#" target="_blank">
                                    All rights are reserved &copy; 2022 HAMZA
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
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
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/mdb.min.js')); ?>"></script> 
        <script>
        var urls = {
            removeGalleryImage: "<?php echo e(url('admin/removeGalleryImage')); ?>",
            editCategory: "<?php echo e(lang_url('admin/categories')); ?>",
            deleteCategories: "<?php echo e(lang_url('admin/delete/categories')); ?>",
            changeStatus: "<?php echo e(lang_url('admin/changeOrderStatus')); ?>"
        };
        var langs = {
            selectOnlyOneCateg: "<?php echo e(__('admin_pages.select_only_one_category')); ?>",
            selectJustOneCateg: "<?php echo e(__('admin_pages.select_just_one_categ')); ?>",
            confirmDeleteCategories: "<?php echo e(__('admin_pages.confirm_delete_categories')); ?>",
            encorrectemailAddr: "<?php echo e(__('admin_pages.incorrect_email_addr')); ?>"
        }
        </script>
        <script src="<?php echo e(asset('js/placeholders.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/adminCustom.js')); ?>"></script> 
    </body>
</html><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/layouts/app_admin.blade.php ENDPATH**/ ?>