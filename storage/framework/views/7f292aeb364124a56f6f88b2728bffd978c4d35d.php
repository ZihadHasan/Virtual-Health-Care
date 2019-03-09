

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
          <th colspan="2"  class="text-center">Action</th>
        </thead>
        <tbody>
          <?php if($appointments->count() > 0): ?>
            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr rowsapn="2">
                <td>
                  <a href="<?php echo e(route('patient.profile',['id' => $appointment->patient->user->id])); ?>"><?php echo e($appointment->patient->user->name); ?></a>
                </td>
                <td>
                  <a href="<?php echo e(route('profile',['id' => $appointment->doctor->id])); ?>"><?php echo e($appointment->doctor->user->name); ?></a>
                </td>
                <td><?php echo e($appointment->date); ?></td>
                <td><?php echo e($appointment->time); ?></td>
                <?php if(!$appointment->sendDoctor): ?>
                  <td colspan="2" class="text-center">
                    <a href="<?php echo e(route('admin.appointment.sent',['id' => $appointment->id])); ?>" class="btn btn-primary">Sent To Doctor</a>
                  </td>
                <?php elseif($appointment->sendDoctor && !$appointment->confirmedDoctor && !$appointment->isRejected): ?>
                  <td colspan="2" class="text-center">
                    <span class="alert-success">Waiting for Doctor's Confimation</span>
                  </td>
                <?php elseif($appointment->sendDoctor && $appointment->isRejected): ?>
                  <td colspan="2" class="text-center">
                    <span href="#" class="alert-danger">Doctor Rejected This Request</span>
                  </td>
                <?php elseif($appointment->sendDoctor && $appointment->confirmedDoctor && !$appointment->isConfirmed && !$appointment->isRejected): ?>
                  <td class="text-center">
                    <a href="<?php echo e(route('admin.appointment.accept',['id' => $appointment->id])); ?>" class="btn btn-success">Accept</a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo e(route('admin.appointment.reject',['id' => $appointment->id])); ?>" class="btn btn-danger">Reject</a>
                  </td>
               <?php elseif($appointment->isConfirmed && !$appointment->isPaid): ?>
                  <td colspan="2" class="text-center">
                    <span class="alert-success">This Request Has Been Confirmed</span>
                  </td>
              <?php elseif($appointment->isPaid): ?>
                 <td colspan="2" class="text-center">
                   <span class="text-success">Paid</span>
                 </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Appointment Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <center><?php echo e($appointments->links()); ?></center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>