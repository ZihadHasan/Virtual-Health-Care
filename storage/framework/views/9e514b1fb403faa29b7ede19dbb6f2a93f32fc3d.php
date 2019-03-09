<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">

    <?php echo $__env->make('admin.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


          <div class="panel panel-default">
              <div class="panel-heading">Update Patient</div>
              <div class="panel-body">
                <form action="<?php echo e(route('admin.patient.update',['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>


                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' value="<?php echo e($user->name); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' value="<?php echo e($user->email); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id='phone' value="<?php echo e($user->phone); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="8" cols="8" class="form-control" id="description"><?php echo e($user->description); ?></textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Update Patient</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>