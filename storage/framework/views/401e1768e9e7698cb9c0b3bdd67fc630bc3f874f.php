<?php $__env->startSection('content'); ?>
  <div class="panel panel-primary">
    <div class="panel-heading">Accountant List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php if($accountants->count() > 0): ?>
            <?php $__currentLoopData = $accountants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountant): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td>
                  <img src="<?php echo e(asset($accountant->user->avatar)); ?>" height="80px" width="60px" alt="">
                </td>
                <td>
                  <?php echo e($accountant->user->name); ?>

                </td>
                <td>
                  <a href="<?php echo e(route('admin.accountant.edit',['id' => $accountant->user->id])); ?>" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="<?php echo e(route('admin.accountant.delete',['id' => $accountant->user->id])); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          <?php else: ?>
            <tr>
              <th colspan="5" class="text-center">No Accountant Exist.</th>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>