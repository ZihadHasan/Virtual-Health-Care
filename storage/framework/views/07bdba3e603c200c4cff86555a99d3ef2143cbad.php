<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">Doctor List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>Department</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php if($doctors->count() > 0): ?>
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td>
                  <img src="<?php echo e(asset($doctor->user->avatar)); ?>" height="80px" width="60px" alt="">
                </td>
                <td>
                  <?php echo e($doctor->user->name); ?>

                </td>
                <td>
                  <?php if($doctor->department_id != NULL): ?>
                    <?php echo e($doctor->department->name); ?>

                  <?php else: ?>
                    No Department !
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?php echo e(route('admin.doctor.edit',['id' => $doctor->user->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="<?php echo e(route('admin.doctor.delete',['id' => $doctor->user->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Doctor Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <center><?php echo e($doctors->links()); ?></center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>