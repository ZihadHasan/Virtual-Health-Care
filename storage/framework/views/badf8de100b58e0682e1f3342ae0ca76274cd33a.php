<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Patient List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan="4"  class="text-center">Action</th>
        </thead>
        <tbody>
          <?php if($appointments->count() > 0): ?>
            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr rowsapn="2">
                <td>
                  <?php echo e($appointment->patient->user->name); ?>

                </td>
                <td><?php echo e($appointment->date); ?></td>
                <td><?php echo e($appointment->time); ?></td>
                  <td class="text-center">
                    <a href="<?php echo e(route('patient.profile',['id' => $appointment->patient->user->id])); ?>" class="btn btn-primary">View</a>
                  </td>
                  <td class="text-center">
                    <a href="<?php echo e(route('patient.consult',['id' => $appointment->id])); ?>" class="btn btn-success">Consult</a>
                  </td>
                  <td>
                    <a href="<?php echo e(route('create.prescription',['id' => $appointment->patient->id])); ?>" class="btn btn-info"> Prescription</a>
                  </td>
                  <td>
                    <a href="<?php echo e(route('prescription.list',['id' => $appointment->patient->id])); ?>" class="btn btn-warning"> List </a>
                  </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Pending Appointment Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
        <tfoot>
          <?php echo e($appointments->links()); ?>

        </tfoot>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>