<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="panel panel-primary text-center">
            <div class="panel-heading"><h3>Testing Things</h3></div>
            <div class="panel-body">
                <?php 
                    $input  = '2018-08-16 2:11:20';
                    $now = Carbon\Carbon::now();
                    $format1 = 'Y-m-d';
                    $format2 = 'i';
                    $date = Carbon\Carbon::parse($input)->format($format1);
                    $time = Carbon\Carbon::parse($input)->format($format2);
                    $time2 = Carbon\Carbon::parse($now)->format($format2);
                 ?>
                <?php echo e($date); ?><br>
                <?php echo e(Carbon\Carbon::now()); ?><br>
                You have : <?php echo e($time+30 - $time2); ?> Mins Only
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>