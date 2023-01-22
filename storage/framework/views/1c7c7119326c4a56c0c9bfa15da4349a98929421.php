<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>" rel="stylesheet" /> 
<div class="card card-cascade narrower categories"> 
    <div class="view gradient-card-header purple-gradient table-name narrower d-flex justify-content-center align-items-center">
        <div class="left-btns">
            <button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" type="button" data-toggle="modal" data-target="#modalAddEditCategory">
                <i class="fa fa-plus mt-0"></i>
            </button>
            <button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" type="button" onclick="editSelectedCategory()">
                <i class="fa fa-pencil mt-0"></i>
            </button>
        </div>
        <a class="white-text mx-3 header-txt" href=""><?php echo e(__('admin_pages.manage_categories')); ?></a>
        <div class="right-btns">
            <button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" type="button" onclick="deleteSelectedCategory()">
                <i class="fa fa-trash mt-0"></i>
            </button>
        </div>
    </div> 
    <div class="table-responsive px-4"> 
        <table class="table table-hover table-responsive mb-0"> 
            <thead>
                <tr>
                    <?php
                    if(!isset($_GET['type']) || $_GET['type'] == 'asc'){
                    $type='desc';
                    }else {
                    $type='asc';
                    } 
                    ?>
                    <th scope="row"><input type="checkbox" id="checkAll"></th>
                    <th class="th-lg">
                        <a href="?order_by=name&type=<?php echo e($type); ?>" class="text-secondary"><?php echo e(__('admin_pages.category_name')); ?> 
                            <?php if($type == 'desc' && isset($_GET['order_by']) && $_GET['order_by'] == 'name'): ?><i class="fa fa-sort-asc ml-1"></i> 
                            <?php elseif($type == 'asc' && isset($_GET['order_by']) && $_GET['order_by'] == 'name'): ?> <i class="fa fa-sort-desc ml-1"></i>
                            <?php elseif(!isset($_GET['order_by']) || $_GET['order_by'] != 'name'): ?> <i class="fa fa-sort ml-1"></i> <?php endif; ?>
                        </a>
                    </th>
                    <th class="th-lg">
                        <a href="?order_by=parent&type=<?php echo e($type); ?>" class="text-secondary"><?php echo e(__('admin_pages.category_parent')); ?>

                            <?php if($type == 'desc' && isset($_GET['order_by']) && $_GET['order_by'] == 'parent'): ?><i class="fa fa-sort-asc ml-1"></i> 
                            <?php elseif($type == 'asc' && isset($_GET['order_by']) && $_GET['order_by'] == 'parent'): ?> <i class="fa fa-sort-desc ml-1"></i>
                            <?php elseif(!isset($_GET['order_by']) || $_GET['order_by'] != 'parent'): ?> <i class="fa fa-sort ml-1"></i> <?php endif; ?>
                        </a>
                    </th>
                    <th class="th-lg text-right">
                        <a href='?order_by=position&type=<?php echo e($type); ?>' class="text-secondary"><?php echo e(__('admin_pages.category_position')); ?>

                            <?php if($type == 'desc' && isset($_GET['order_by']) && $_GET['order_by'] == 'position'): ?><i class="fa fa-sort-asc ml-1"></i> 
                            <?php elseif($type == 'asc' && isset($_GET['order_by']) && $_GET['order_by'] == 'position'): ?> <i class="fa fa-sort-desc ml-1"></i>
                            <?php elseif(!isset($_GET['order_by']) || $_GET['order_by'] != 'position'): ?> <i class="fa fa-sort ml-1"></i> <?php endif; ?>
                        </a>
                    </th> 
                </tr>
            </thead> 
            <tbody>
                <?php 
                if(!$categories->isEmpty()) {
                ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr>
                    <th scope="row">
                        <input type="checkbox" name="category_id[]" value="<?php echo e($categ->id); ?>">
                    </th>
                    <td><?php echo e($categ->name); ?></td>
                    <td><?php echo e($categ->parent); ?></td>
                    <td class="text-right"><?php echo e($categ->position); ?></td> 
                </tr> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php 
                } else {
                ?>
                <tr>
                    <td colspan="4"><?php echo e(__('admin_pages.no_categories_found')); ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>   
        </table>
    </div>
    <hr class="my-0">
    <?php echo e($categories->links()); ?>

</div> 
<div class="modal fade" id="modalAddEditCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header bg-secondary white-text">
                <h4 class="title"><i class="fa fa-pencil"></i> <?php echo e(__('admin_pages.add_edit_category')); ?></h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <form method="POST" action="">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body mb-0">
                    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $lKey = false; if($category !== null && $category['translations'] != null) { $lKey = array_search($locale, array_column($category['translations'], 'locale')); } ?>
                    <input type="hidden" name="translation_order[]" value="<?php echo e($locale); ?>">
                    <div class="locale-container locale-container-<?php echo e($locale); ?>" <?php if($currentLocale == $locale): ?> style="display:block;" <?php endif; ?>>
                         <div class="md-form form-sm">
                            <i class="fa fa-star prefix"></i>
                            <input type="text" id="category_name-<?php echo e($locale); ?>" value="<?php echo e($lKey !== false ? $category['translations'][$lKey]->name : ''); ?>" name="name[]" class="form-control">
                            <label for="category_name-<?php echo e($locale); ?>"><?php echo e(__('admin_pages.category_name')); ?>(<?php echo e($locale); ?>)</label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    <div class="md-form form-sm">
                        <i class="fa fa-undo prefix"></i>
                        <div class="picker-left">
                            <select class="selectpicker" name="parent" id="category_parent" data-style="btn-secondary">
                                <option value="0" selected=""><?php echo e(__('admin_pages.none_selected')); ?></option>
                                <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aCateg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <option value="<?php echo e($aCateg->id); ?>"><?php echo e($aCateg->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <label for="category_parent"><?php echo e(__('admin_pages.category_parent')); ?></label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-sort prefix"></i>
                        <input type="text" id="category_position" name="position" value="<?php echo e(isset($category['category']->position) ? $category['category']->position : '0'); ?>" class="form-control">
                        <label for="category_position"><?php echo e(__('admin_pages.category_position')); ?></label>
                    </div>
                    <div class="text-center mt-1-half">
                        <button class="btn btn-secondary mb-2"><?php echo e(__('admin_pages.save')); ?></button>
                    </div> 
                </div>
            </form>
        </div> 
    </div>
</div> 
<script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
<script>
$('.selectpicker').selectpicker();
<?php
    if (isset($_GET['edit'])) {
?>
    $(document).ready(function(){
        $('#modalAddEditCategory').modal('show');
    });
    $("#modalAddEditCategory").on("hidden.bs.modal", function () {
        window.location.href = "<?php echo e(lang_url('admin/categories')); ?>";
    });
<?php
    }
?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/categories.blade.php ENDPATH**/ ?>