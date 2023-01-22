<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="add-slider">
            <button class="btn btn-sm btn-secondary waves-effect waves-light pull-right" data-toggle="modal" data-target="#modalAddSlide">
                <?php echo e(__('admin_pages.add_new_slide')); ?>

            </button>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row carousel-sliders">
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slide">
            <img src="<?php echo e(asset('storage/'.$slider->image)); ?>" class="img-fluid z-depth-1" alt="1">
            <span class="link">
                <a href="<?php echo e($slider->link); ?>" target="_blank"><?php echo e($slider->link); ?></a>
            </span>
            <span class="position z-depth-2"><?php echo e($slider->position); ?></span>
            <a href="<?php echo e(lang_url('admin/delete/slider/'.$slider->id)); ?>" class="btn btn-sm btn-secondary waves-effect waves-light confirm delete" data-my-message="<?php echo e(__('admin_pages.are_u_sure_delete_s')); ?>">
                <i class="fa fa-trash mt-0"></i>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($sliders->links()); ?>

    </div>
</div>
<div class="modal fade" id="modalAddSlide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('admin_pages.add_new_slide')); ?></h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="formAddSlide" action="" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="md-form available-translations">
                        <span><?php echo e(__('admin_pages.choose_locale')); ?></span>
                        <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-locale-change="<?php echo e($locale); ?>" class="btn btn-outline-secondary waves-effect locale-change <?php if($currentLocale == $locale): ?> active <?php endif; ?>"><?php echo e($locale); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr>
                    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="translation_order[]" value="<?php echo e($locale); ?>">
                    <div class="locale-container locale-container-<?php echo e($locale); ?>" <?php if($currentLocale==$locale): ?> style="display:block;" <?php endif; ?>>
                        <div class="md-form">
                            <label class="alone"><?php echo e(__('admin_pages.image_slide')); ?></label>
                            <div class="element-label-text">
                                <div class="upload-wrap">
                                    <button type="button" class="btn btn-secondary"><?php echo e(__('admin_pages.choose_cover_img')); ?></button>
                                    <input type="file" name="image_<?php echo e($locale); ?>[]" class="upload-btn">
                                    <div class="file-name"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.position')); ?></label>
                        <div class="element-label-text">
                            <input type="text" value="" placeholder="1" name="position" class="form-control">
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="alone"><?php echo e(__('admin_pages.link')); ?></label>
                        <div class="element-label-text">
                            <input type="text" value="" placeholder="http://yoursite.com/product-link-1" name="link" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('admin_pages.close')); ?></button>
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('formAddSlide').submit();"><?php echo e(__('admin_pages.add')); ?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.upload-btn').change(function() {
        $(this).next('.file-name').show().append($(this).val());
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/carousel.blade.php ENDPATH**/ ?>