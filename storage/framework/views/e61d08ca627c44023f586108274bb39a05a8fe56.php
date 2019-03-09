<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">

    <?php echo $__env->make('admin.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


          <div class="panel panel-default">
              <div class="panel-heading">Update Department: <?php echo e($department->name); ?></div>
              <div class="panel-body">
                <form action="<?php echo e(route('department.update',['id' => $department->id])); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" id='name' class="form-control" value="<?php echo e($department->name); ?>">
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Upadate Department</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>