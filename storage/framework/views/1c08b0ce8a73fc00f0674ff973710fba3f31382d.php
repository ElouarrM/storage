<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>" rel="stylesheet" />
<div class="orders-page">
    <div class="card card-cascade narrower">
        <div class="table-responsive-xs">
            <table class="table">
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('admin_pages.time_created')); ?></th>
                        <th><?php echo e(__('admin_pages.order_type')); ?></th>
                        <th><?php echo e(__('admin_pages.phone')); ?></th>
                        <th><?php echo e(__('admin_pages.status')); ?></th>
                        <th class="text-right"><i class="fa fa-list" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->order_id); ?></td>
                        <td><?php echo e($order->time_created); ?></td>
                        <td><?php echo e(__('admin_pages.ord_'.$order->type)); ?></td>
                        <td><?php echo e($order->phone); ?></td>
                        <td>
                            <select class="selectpicker change-ord-status" data-ord-id="<?php echo e($order->orderId); ?>" data-style="btn-secondary">
                                <option <?php echo e($order->status == 0 ? 'selected="selected"' : ''); ?> value="0"><?php echo e(__('admin_pages.ord_status_new')); ?></option>
                                <option <?php echo e($order->status == 1 ? 'selected="selected"' : ''); ?> value="1"><?php echo e(__('admin_pages.ord_status_processed')); ?></option>
                                <option <?php echo e($order->status == 2 ? 'selected="selected"' : ''); ?> value="2"><?php echo e(__('admin_pages.ord_status_rej')); ?></option>
                            </select>
                        </td>
                        <td class="text-right">
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary show-more" data-show-tr="<?php echo e($order->order_id); ?>">
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                <i class="fa fa-chevron-up" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="tr-more" data-tr="<?php echo e($order->order_id); ?>">
                        <td colspan="6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul>
                                        <li>
                                            <b><?php echo e(__('admin_pages.first_name')); ?></b> <span><?php echo e($order->first_name); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.last_name')); ?></b> <span><?php echo e($order->last_name); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.email')); ?></b> <span><?php echo e($order->email); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.phone')); ?></b> <span><?php echo e($order->phone); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.address')); ?></b> <span><?php echo e($order->address); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.city')); ?></b> <span><?php echo e($order->city); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.post_code')); ?></b> <span><?php echo e($order->post_code); ?></span>
                                        </li>
                                        <li>
                                            <b><?php echo e(__('admin_pages.notes')); ?></b> <span><?php echo e($order->notes); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <?php
                                    foreach(unserialize($order->products) as $product) {
                                    $producta = $controller->getProductInfo($product['id']);
                                    ?>
                                    <div class="product">
                                        <a href="<?php echo e(lang_url($producta->url)); ?>" target="_blank">
                                            <img src="<?php echo e(asset('storage/'.$producta->image)); ?>" alt="">
                                            <div class="info">
                                                <span class="name"><?php echo e($producta->name); ?></span>
                                                <span class="qiantity">
                                                    <b><?php echo e(__('admin_pages.quantity')); ?></b> <?php echo e($product['quantity']); ?>

                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo e($orders->links()); ?>

    <div class="fast-orders">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php echo e(__('admin_pages.new_fast_orders')); ?></h2>
                <div class="card card-cascade narrower">
                    <div class="table-responsive-xs">
                        <table class="table">
                            <thead class="blue-grey lighten-4">
                                <tr>
                                    <th><?php echo e(__('admin_pages.time_created')); ?></th>
                                    <th><?php echo e(__('admin_pages.phone')); ?></th>
                                    <th><?php echo e(__('admin_pages.names')); ?></th>
                                    <th class="text-right"><?php echo e(__('admin_pages.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($fastOrders)) {
                                ?>
                                <?php $__currentLoopData = $fastOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($fOrder->time_created); ?></td>
                                    <td><?php echo e($fOrder->phone); ?></td>
                                    <td><?php echo e($fOrder->names); ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo e(lang_url('admin/fast/ord/is/viewed/'.$fOrder->id)); ?>" class="btn btn-sm btn-secondary confirm" data-my-message="<?php echo e(__('admin_pages.are_u_sure_mark_fOrd')); ?>">
                                            <?php echo e(__('admin_pages.viewed_mark')); ?>

                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                } else {
                                ?>
                                <tr>
                                    <td colspan="4"><?php echo e(__('admin_pages.no_fast_orders')); ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
<script>
    $('.change-ord-status').change(function() {
        var order_id = $(this).data('ord-id');
        var order_value = $(this).val();
        $.ajax({
            type: "POST",
            url: urls.changeStatus,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                order_id: order_id,
                order_value: order_value
            }
        }).done(function(data) {
            showAlert('success', "<?php echo e(__('admin_pages.status_changed')); ?>");
        });
    });
    $('.show-more').click(function() {
        var tr_id = $(this).data('show-tr');
        $('table').find('[data-tr="' + tr_id + '"]').toggle(function() {
            if ($('[data-tr="' + tr_id + '"]').is(':visible')) {
                $('.orders-page .fa-chevron-up').show();
                $('.orders-page .fa-chevron-down').hide();
            } else {
                $('.orders-page .fa-chevron-up').hide();
                $('.orders-page .fa-chevron-down').show();
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hamzadabbouh/Downloads/ecomm-pfe-master/resources/views/admin/orders.blade.php ENDPATH**/ ?>