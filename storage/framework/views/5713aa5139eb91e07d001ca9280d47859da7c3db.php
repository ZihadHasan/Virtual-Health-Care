<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">

    <?php echo $__env->make('admin.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


          <div class="panel panel-primary">
              <div class="panel-heading">Update Doctor</div>
              <div class="panel-body">
                <form action="<?php echo e(route('admin.doctor.update',['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department_id">
                      <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option <?php if($user->doctor->department_id == $department->id): ?> selected <?php endif; ?> value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' value="<?php echo e($user->name); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id='title' value="<?php echo e($user->doctor->title); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="fees">Fees</label>
                    <input type="text" name="bill" id='fees' value="<?php echo e($user->doctor->bill); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' value="<?php echo e($user->email); ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="8" cols="8" class="form-control" id="description"><?php echo e($user->description); ?></textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Update Doctor</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>