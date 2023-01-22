<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('css/bootstrap-switch.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="folder" value="<?php echo e(isset($product['product']->folder) ? $product['product']->folder : '0'); ?>">
            <div class="card">
                <div class="card-body">
                    <div class="form-header btn-secondary">
                        <h3>
                            <?php echo e(__('admin_pages.publish_your_products')); ?>

                        </h3>
                    </div>
                    <hr>
                    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $lKey = false; if($product !== null && $product['translations'] != null) { $lKey = array_search($locale, array_column($product['translations'], 'locale')); } ?>
                    <input type="hidden" name="translation_order[]" value="<?php echo e($locale); ?>">
                    <div class="locale-container locale-container-<?php echo e($locale); ?>" <?php if($currentLocale==$locale): ?> style="display:block;" <?php endif; ?>>
                        <div class="md-form">
                            <i class="fa fa-font prefix grey-text"></i>
                            <input type="text" name="name[]" value="<?php echo e($lKey !== false ? $product['translations'][$lKey]->name : ''); ?>" id="publishForm-name-<?php echo e($locale); ?>" class="form-control">
                            <label for="publishForm-name-<?php echo e($locale); ?>"><?php echo e(__('admin_pages.product_name')); ?>(<?php echo e($locale); ?>)</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-pencil prefix grey-text"></i>
                            <textarea name="description[]" type="text" id="productDescr-<?php echo e($locale); ?>" class="md-textarea"><?php echo e($lKey != false ? $product['translations'][$lKey]->description : ''); ?></textarea>
                            <label for="productDescr-<?php echo e($locale); ?>"><?php echo e(__('admin_pages.product_description')); ?>(<?php echo e($locale); ?>)</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-eur prefix grey-text"></i>
                            <input type="text" name="price[]" value="<?php echo e($lKey !== false ? $product['translations'][$lKey]->price : ''); ?>" id="publishForm-price-<?php echo e($locale); ?>" class="form-control">
                            <label for="publishForm-price-<?php echo e($locale); ?>"><?php echo e(__('admin_pages.product_price')); ?>(<?php echo e($locale); ?>)</label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="md-form">
                        <i class="fa fa-sort-numeric-desc prefix grey-text"></i>
                        <input type="text" name="quantity" value="<?php echo e(isset($product['product']->quantity) ? $product['product']->quantity : ''); ?>" id="publishForm-quantity" class="form-control">
                        <label for="publishForm-quantity"><?php echo e(__('admin_pages.quantity')); ?></label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-sort prefix grey-text"></i>
                        <input type="text" name="order_position" value="<?php echo e(isset($product['product']->order_position) ? $product['product']->order_position : ''); ?>" id="publishForm-position" class="form-control">
                        <label for="publishForm-position"><?php echo e(__('admin_pages.order_position')); ?></label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-link prefix grey-text"></i>
                        <input type="text" name="link_to" value="<?php echo e(isset($product['product']->link_to) ? $product['product']->link_to : ''); ?>" id="publishForm-linkto" class="form-control">
                        <label for="publishForm-linkto"><?php echo e(__('admin_pages.link_to')); ?></label>
                    </div>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.choose_category')); ?></label>
                        <div class="element-label-text bordered-div">
                            <select class="selectpicker" name="category_id" data-style="btn-secondary">
                                <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aCateg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($aCateg->id); ?>" <?php echo e(isset($product['product']->category_id) && $product['product']->category_id == $aCateg->id ? 'selected' : ''); ?>><?php echo e($aCateg->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.hidden_product')); ?></label>
                        <div class="element-label-text bordered-div">
                            <input type="checkbox" class="switch-me" <?php echo e(isset($product['product']->hidden) && $product['product']->hidden == 1 ? 'checked="checked"' : ''); ?> data-on-color="secondary" name="hidden">
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.tags_product')); ?></label>
                        <div class="element-label-text bordered-div">
                            <input type="text" data-role="tagsinput" value="<?php echo e(isset($product['product']->tags) ? $product['product']->tags : ''); ?>" name="tags" class="form-control input-tags">
                        </div>
                    </div>
                    <?php
                    if(isset($product['product']->image)) {
                    ?>
                    <input type="hidden" value="<?php echo e($product['product']->image); ?>" name="old_image">
                    <div class="md-form">
                        <img src="<?php echo e(asset('storage/'.$product['product']->image)); ?>" alt="<?php echo e(__('admin_pages.no_choosed_image')); ?>" style="max-height: 300px;" class="img-thumbnail">
                    </div>
                    <?php
                    }
                    ?>
                    <div class="md-form clone-file-upload">
                        <label class="alone"><?php echo e(__('admin_pages.cover_image')); ?></label>
                        <div class="element-label-text">
                            <div class="upload-wrap">
                                <button type="button" class="btn btn-secondary"><?php echo e(isset($product['product']->image) ? __('admin_pages.choose_new_cover_img') : __('admin_pages.choose_cover_img')); ?></button>
                                <input type="file" name="cover_image" id="cover-upload" class="upload-btn">
                                <div class="file-name"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($product['product']->folder)) {
                    ?>
                    <div class="md-form">
                        <div class="gallery-images">
                            <?php
                            $dir = '../storage/app/public/moreImagesFolders/'.$product['product']->folder.'/';
                            if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                            $i = 0;
                            while (($file = readdir($dh)) !== false) {
                            if (is_file($dir . $file)) {
                            ?>
                            <div id="image-container-<?php echo e($i); ?>">
                                <img src="<?php echo e(asset('storage/moreImagesFolders/'.$product['product']->folder.'/'.$file)); ?>" alt="<?php echo e(__('admin_pages.no_choosed_image')); ?>" style="max-height: 300px;" class="img-thumbnail">
                                <a href="javascript:void(0);" onclick="removeGalleryImage('<?php echo e($product['product']->folder.'/'.$file); ?>', <?php echo e($i); ?>)"><i class="material-icons">delete</i></a>
                            </div>
                            <?php
                            $i++;
                            }
                            }
                            closedir($dh);
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.gallery_images')); ?></label>
                        <div class="element-label-text">
                            <button type="button" class="btn btn-secondary" onclick="showMeNewImgUpload()"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(__('admin_pages.add_gallery_image')); ?></button>
                        </div>
                    </div>
                    <div class="clones"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-secondary waves-effect waves-light"><?php echo e(__('admin_pages.save')); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/bootstrap-tagsinput.min.js')); ?>" type="text/javascript"></script>
<script>
    $('.selectpicker').selectpicker();
    $('.switch-me').bootstrapSwitch();
    document.getElementById('cover-upload').onchange = function() {
        $('.upload-wrap .file-name').show().append(this.value);
    };

    function showMeNewImgUpload() {
        $('.clones').append('<div><input type="file" name="gallery_image[]" multiple></div>');
    }
    $('.input-tags').tagsinput({
        tagClass: function() {
            return 'label label-secondary';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/publish.blade.php ENDPATH**/ ?>