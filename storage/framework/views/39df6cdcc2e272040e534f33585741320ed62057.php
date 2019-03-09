

<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <?php if($proceed == 0): ?>
        Check Your Details Again
      <?php elseif($proceed == 1): ?>
        Pay The Bill
      <?php elseif($proceed == 2): ?>
        <center><b>Payment information</b></center>
      <?php elseif($proceed == 3): ?>
        <center><b>Detailed information</b></center>
      <?php endif; ?>
    </div>
    <div class="panel-body">
        <?php if($proceed == 0 || $proceed == 1): ?>
          <div class="printableArea">
            <span class="pull-right">
              <img src="<?php echo e(asset($appointment->doctor->user->avatar)); ?>" height="80px" width="80px" alt="your doctor"><br>
              <small><?php echo e($appointment->doctor->user->name); ?></small><br>
              <small><?php echo e($appointment->doctor->title); ?></small>
            </span>
            <b>Doctor     : </b><?php echo e($appointment->doctor->user->name); ?><br>
            <b>Title      : </b><?php echo e($appointment->doctor->title); ?><br>
            <b>Department : </b><?php echo e($appointment->doctor->department->name); ?><br>
            <b>Bill       : </b><?php echo e(number_format($appointment->doctor->bill)); ?><br>
            <b>Date       : </b><?php echo e($appointment->date); ?><br>
            <b>Time       : </b><?php echo e($appointment->time); ?><br><br><br>
          </div>
        <?php if($proceed == 0): ?>
          <a href="<?php echo e(route('patient.appointment.proceed',['id' => $appointment->id])); ?>" class="btn btn-sm ehealth">Proceed</a>
        <?php elseif($proceed == 1): ?>
          <?php echo $__env->make('patients.appointments.stripe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
      <?php elseif($proceed == 2): ?>
          <?php echo $__env->make('patients.appointments.paid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php elseif($proceed == 3): ?>
          <?php echo $__env->make('patients.appointments.details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>
    </div>
    <div class="panel-footer">
      <a class="btn btn-sm btn-default" href="javascript:void(0);" id="printButton">print</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.PrintArea.js')); ?>"></script>
  <script>
    $(document).ready(function(){
        $("#printButton").click(function(){
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.printableArea").printArea( options );
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>