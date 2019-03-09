

<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Appointment List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan="2"  class="text-center">Status</th>
        </thead>
        <tbody>
          <?php if($appointments->count() > 0): ?>
            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr rowsapn="2">
                <td>
                  <?php echo e($appointment->patient->user->name); ?>

                </td>
                <td>
                  <?php echo e($appointment->doctor->user->name); ?>

                </td>
                <td><?php echo e($appointment->date); ?></td>
                <td><?php echo e($appointment->time); ?></td>
                <?php if($appointment->isPaid): ?>
                  <td colspan="2" class="text-center">
                    <a href="<?php echo e(route('accountant.appointment.get',['id'=>$appointment->id])); ?>" class="btn btn-primary">Verify Payment</a>
                  </td>
                <?php else: ?>
                  <td colspan="2" class="text-center">
                    <span class="alert-primary">Yet to be paid</span>
                  </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Unverified Appointment Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>