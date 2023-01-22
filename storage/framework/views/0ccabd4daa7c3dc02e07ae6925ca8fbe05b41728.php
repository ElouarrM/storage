<?php $__env->startSection('content'); ?>
<div class="card card-cascade narrower">
    <div class="table-responsive">
        <table class="table">
            <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('admin_pages.user_name')); ?></th>
                    <th><?php echo e(__('admin_pages.user_email')); ?></th>
                    <th>type</th>
                    <th><?php echo e(__('admin_pages.user_created_at')); ?></th>
                    <th><?php echo e(__('admin_pages.user_updated_at')); ?></th>
                    <th class="text-right">
                        <button class="btn btn-sm btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#modalAddEditUsers">
                            <?php echo e(__('admin_pages.add_user')); ?>

                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($user->id); ?></th>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->type); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                    <td><?php echo e($user->updated_at); ?></td>
                    <td class="text-right">
                        <a href="?edit=<?php echo e($user->id); ?>" class="btn btn-sm btn-secondary waves-effect waves-light"><?php echo e(__('admin_pages.edit_user')); ?></a>
                        <a href="<?php echo e(lang_url('admin/delete/user/'.$user->id)); ?>" class="btn btn-sm btn-secondary waves-effect waves-light confirm" data-my-message="<?php echo e(__('admin_pages.are_u_sure_delete_u')); ?>"><?php echo e(__('admin_pages.delete_user')); ?></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo e($users->links()); ?>

<!-- Modal Add/Edit users -->
<div class="modal fade" id="modalAddEditUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('admin_pages.user_settings')); ?></h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formManageUsers">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="edit" value="<?php echo e(isset($_GET['edit']) ? $_GET['edit'] : 0); ?>">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" name="name" value="<?php echo e($userInfo != null? $userInfo->name : ''); ?>" id="defaultForm-name" class="form-control">
                        <label for="defaultForm-name"><?php echo e(__('admin_pages.user_name')); ?></label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="text" name="email" value="<?php echo e($userInfo != null? $userInfo->email : ''); ?>" id="defaultForm-email" class="form-control">
                        <label for="defaultForm-email"><?php echo e(__('admin_pages.user_email')); ?></label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="password" id="defaultForm-pass" class="form-control">
                        <label for="defaultForm-pass"><?php echo e(__('admin_pages.user_password')); ?></label>
                    </div>
                    <label for="defaultForm-type">Type</label>
                    <div class="md-form">
                        <i class="fa fa-person prefix grey-text"></i>
                        <select name="type" id="defaultForm-type" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('admin_pages.close')); ?></button>
                <button type="button" class="btn btn-secondary" onclick="updateUser()"><?php echo e(__('admin_pages.save_changes')); ?></button>
            </div>
        </div>
    </div>
</div>
<script>
    <?php
    if (isset($_GET['edit'])) {
        ?>
        $(document).ready(function() {
            $('#modalAddEditUsers').modal('show');
        });
        $("#modalAddEditUsers").on("hidden.bs.modal", function() {
            window.location.href = "<?php echo e(lang_url('admin/users')); ?>";
        });
        <?php
    }
    ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/users.blade.php ENDPATH**/ ?>