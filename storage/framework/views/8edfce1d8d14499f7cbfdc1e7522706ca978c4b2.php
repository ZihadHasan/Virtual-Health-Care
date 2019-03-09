<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">Patient List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>phone</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php if($patients->count() > 0): ?>
            <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td>
                  <img src="<?php echo e(asset($patient->user->avatar)); ?>" height="80px" width="60px" alt="">
                </td>
                <td>
                  <?php echo e($patient->user->name); ?>

                </td>
                <td>
                <?php echo e($patient->user->phone); ?>

                </td>
                <td>
                  <a href="<?php echo e(route('admin.patient.edit',['id' => $patient->user->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="<?php echo e(route('admin.patient.delete',['id' => $patient->user->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Patient Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <center><?php echo e($patients->links()); ?></center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>