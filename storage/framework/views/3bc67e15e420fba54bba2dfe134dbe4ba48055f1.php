<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Appointment List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan="3"  class="text-center">Action</th>
        </thead>
        <tbody>
          <?php if($appointments->count() > 0): ?>
            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr rowsapn="2">
                <td>
                  <?php echo e($appointment->doctor->user->name); ?>

                </td>
                <td><?php echo e($appointment->date); ?></td>
                <td><?php if($appointment->time != NULL): ?> <?php echo e($appointment->time); ?> <?php else: ?> Wait For Doctor <?php endif; ?></td>
                <?php if($appointment->sendDoctor && !$appointment->isConfirmed && !$appointment->isRejected): ?>
                  <td colspan="2" class="text-center">
                    <span class="alert-info">Your Request is Under Process</span>
                  </td>
                <?php elseif($appointment->isConfirmed): ?>
                  <?php if(!$appointment->isPaid): ?>
                    <td colspan="2" class="text-center">
                      <a href="<?php echo e(route('patient.appointment.pay',['id' => $appointment->id])); ?>" class="btn btn-sm ehealth">Pay The Bill</a>
                    </td>
                  <?php else: ?>
                    <td class="text-center">
                      <span style="color:green; font-weight:bold;">PAID</span>
                    </td>
                  <?php endif; ?>
                    <?php if($appointment->isVerified): ?>
                      <td class="text-center">
                        <a href="<?php echo e(route('patient.appointment.paid.details',['id' => $appointment->id])); ?>" class="btn btn-sm btn-primary">Details</a>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo e(route('patient.consult',['id' => $appointment->id])); ?>" class="btn btn-success btn-sm">Get Consulted</a>
                      </td>
                    <?php elseif($appointment->isPaid && !$appointment->isVerified): ?>
                      <td>
                        <span style="color:blue; font-weight:bold;">Reviewing</span>
                      </td>
                  <?php endif; ?>
                <?php elseif($appointment->isRejected): ?>
                  <td colspan="2" class="text-center">
                    <a href="<?php echo e(route('patient.appointment.delete',['id' => $appointment->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                <?php else: ?>
                  <td class="text-center">
                    <a href="<?php echo e(route('patient.appointment.edit',['id' => $appointment->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo e(route('patient.appointment.delete',['id' => $appointment->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                <?php endif; ?>
              </tr>
              <?php if($appointment->isConfirmed): ?>
                <tr>
                  <td colspan="5" class="text-center">
                      <span class="text-success"><b>Your Appointment has been Confirmed<b></span><br>
                      <?php if(!$appointment->isPaid): ?>
                          <span class="text-info"><b>You have <?php echo e($time = Carbon\Carbon::parse($appointment->updated_at)->format('i')+30 - $now); ?> Mins only to Pay the bill<b></span>
                      <?php endif; ?>
                  </td>
                </tr>
              <?php elseif($appointment->isRejected): ?>
                <tr>
                  <td colspan="7" class="text-center"><span class="alert-danger">Sorry ! Your appointment has been rejected</span></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="7" class="text-center">No Appointment Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>