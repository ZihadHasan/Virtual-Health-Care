<?php $__env->startSection('content'); ?>
  <div class="panel panel-default">
    <div class="panel-heading ehealth">
      Enter The Identity No.
    </div>
    <div class="panel-body">
      <form class="form-inline text-center" action="<?php echo e(route('accountant.appointment.recieption.submit')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label class="label-control" for="identity">Identity No: </label>
          <input type="text" name="id" value="<?php if($find): ?> <?php echo e($query); ?> <?php endif; ?>" id="identity" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" value="Get information" class="btn btn-sm btn-primary">
        </div>
      </form>
    </div>
  </div>
  <?php if($find): ?>
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        Info for Identity No: <?php echo e($query); ?>

      </div>
      <div class="panel-body">
        <?php if($appointment): ?>
          <center><h3>Detailed Informations</h3></center>
          <span class="pull-right">
            <b>Date:</b><?php echo e($appointment->checkout->created_at->format('d/m/Y')); ?><br>
            <b>ID No: </b><?php echo e($appointment->checkout->id); ?><br>
            <b><?php echo e($appointment->checkout->identity); ?></b><br>
            <img src="<?php echo e(asset($appointment->patient->user->avatar)); ?>" height="80px" width="80px" alt="your picture"><br>
            <small><?php echo e($appointment->patient->user->name); ?></small><br>
          </span>
          <b>Doctor info</b>:<br>
          <b>Doctor     : </b><?php echo e($appointment->doctor->user->name); ?><br>
          <b>Title      : </b><?php echo e($appointment->doctor->title); ?><br>
          <b>Department : </b><?php echo e($appointment->doctor->department->name); ?><br>
          <b>Bill       : </b><?php echo e(number_format($appointment->doctor->bill)); ?> <b>(PAID)</b><br>
          <b>Date       : </b><?php echo e($appointment->date); ?><br>
          <b>Time       : </b><?php echo e($appointment->time); ?><br><br>
          <b>Patient Info</b>:<br>
          <b>Name       : </b><?php echo e($appointment->patient->user->name); ?><br>
          <b>Mobile     : </b><?php echo e($appointment->patient->user->phone); ?><br>
          <b>Age        : </b><?php echo e($appointment->patient->user->age); ?><br>
          <b>Gender     : </b><?php if(!$appointment->patient->user->gender): ?>Male <?php else: ?> Female <?php endif; ?> <br><br>
          <?php if(!$appointment->isVerified): ?>
            <a href="<?php echo e(route('accountant.appointment.verify',['id' => $appointment->id])); ?>" class="btn btn-sm pull-right ehealth">Verify Payment</a>
          <?php endif; ?>
        <?php else: ?>
          <div class="alert alert-warning">
            No Details Found For ID No. <?php echo e($query); ?>

          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>