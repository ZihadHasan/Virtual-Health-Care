<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">Department List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Department Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php if($departments->count() > 0): ?>
            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td>
                  <?php echo e($department->name); ?>

                </td>
                <td>
                  <a href="<?php echo e(route('department.edit',['id' => $department->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="<?php echo e(route('department.delete',['id' => $department->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Department Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <center><?php echo e($departments->links()); ?></center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>