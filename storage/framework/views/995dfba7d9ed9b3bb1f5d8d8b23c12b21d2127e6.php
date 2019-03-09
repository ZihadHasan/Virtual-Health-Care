<?php if($paid == 1): ?>
  <div class="printableArea">
    <center><h3>Detailed Informations</h3></center>
    <span class="pull-right">
      <b>Date:</b><?php echo e($appointment->checkout->created_at->format('d/m/Y')); ?><br>
      <b><?php echo e($appointment->checkout->identity); ?></b><br>
      <img src="<?php echo e(asset($appointment->patient->user->avatar)); ?>" height="80px" width="80px" alt="your picture"><br>
      <small><?php echo e($appointment->patient->user->name); ?></small><br>
    </span>
    <b>Doctor info</b>:<br>
    <b>Doctor     : </b><?php echo e($appointment->doctor->user->name); ?><br>
    <b>ID No: </b><?php echo e($appointment->checkout->id); ?><br>
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
  </div>
<?php else: ?>
  <center><h4>Please Pay The Bill</h4></center>
<?php endif; ?>
