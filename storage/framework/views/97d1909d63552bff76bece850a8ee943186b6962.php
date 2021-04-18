<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">Prescription List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th colspan="2">Action</th>
        </thead>
        <tbody>
          <?php if($prescriptions->count() > 0): ?>
            <?php $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pre): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td>
                  <?php echo e($pre->patient->user->name); ?>

                </td>
                <td>
                  <?php echo e($pre->doctor->user->name); ?>

                </td>

                <?php if(Auth::user()->isDoctor && $pre->doctor->user->id == Auth::id()): ?>
                  <td>
                    <a href="<?php echo e(route('prescription.edit',['id' => $pre->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                  </td>
                <?php endif; ?>


                <?php if(Auth::id() == $pre->patient->user->id || Auth::user()->isDoctor): ?>
                  <td>
                    <a href="<?php echo e(route('show.prescription',['id' => $pre->id])); ?>" class="btn btn-success btn-sm">View</a>
                  </td>
                <?php endif; ?>

              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No prescription Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <center><?php echo e($prescriptions->links()); ?></center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>