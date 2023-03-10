<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('js/Highcharts-5.0.14/code/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('js/Highcharts-5.0.14/code/modules/exporting.js')); ?>"></script>
<div id="container-by-month" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
<script>
    $(function() {
        Highcharts.chart('container-by-month', {
            title: {
                text: 'Monthly Orders',
                x: -20
            },
            subtitle: {
                text: 'Source: Orders table',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            yAxis: {
                title: {
                    text: 'Orders'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Orders'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
                <?php
                foreach($ordersByMonth['years'] as $year) {
                    ?> {
                        name: '<?php echo e($year); ?>',
                        data: [<?php echo implode(',', $ordersByMonth['orders'][$year]);?>]
                    },
                    <?php
                }
                ?>
            ]
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MOUNIR\Desktop\ecomm-pfe-master\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>