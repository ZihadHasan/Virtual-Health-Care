<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Photo
        </div>
        <div class="panel-body">
          <center>
            <img src="<?php echo e(asset($user->avatar)); ?>" height="100px" width="80px" alt="">
          </center>
          <form action="<?php echo e(route('user.profile.picture')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label class="lable-control" for="photo">Photo</label>
              <input type="file" class="form-control" name="avatar" id="photo">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
      <?php if($user->isDoctor): ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            Specilities
          </div>
          <div class="panel-body">
            <form action="<?php echo e(route('user.profile.specialities')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <label for="department" class="label-control">Department</label>
                <select class="form-control" name="department_id" id="department">
                  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option <?php if($user->doctor->department_id == $department->id): ?> selected <?php endif; ?> value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="title" class="label-control">Title</label>
                <input class="form-control" name="title" id="title" value="<?php echo e($user->doctor->title); ?>">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary bt-sm" value="Update">
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Personal Information
        </div>
        <div class="panel-body">
          <form action="<?php echo e(route('user.profile.information')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label class="lable-control" for="gender">Gender: </label>
              <select class="form-control" name="gender" id="gender">
                <option <?php if(!$user->gender): ?>selected <?php endif; ?> value="0">Male</option>
                <option <?php if($user->gender): ?>selected <?php endif; ?> value="1">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label class="lable-control" for="name">Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" id="name">
            </div>
            <div class="form-group">
              <label class="lable-control" for="age">Age</label>
              <input type="text" name="age" class="form-control" value="<?php echo e($user->age); ?>" id="age">
            </div>
            <div class="form-group">
              <label class="lable-control" for="email">Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" title="Ask Admin For Change Your Email" id="email" disabled>
            </div>
            <div class="form-group">
              <label class="lable-control" for="phone">Phone</label>
              <input type="text" name="phone" class="form-control" value="<?php echo e($user->phone); ?>" id="phone">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
      <?php if(!Auth::user()->isAccountant): ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <?php if($user->isDoctor): ?>
              Objectives
            <?php elseif($user->isPatient): ?>
              Address
            <?php endif; ?>
          </div>
          <div class="panel-body">
            <form action="<?php echo e(route('user.profile.address')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <label class="lable-control" for="address"><?php if($user->isDoctor): ?>
                  Objectives
                <?php elseif($user->isPatient): ?>
                  Address
                <?php endif; ?>
              </label>
                <textarea name="description" class="form-control" rows="8" cols="8" id="address"><?php echo e($user->description); ?></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary bt-sm" value="Update">
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Update Password
        </div>
        <div class="panel-body">
          <form action="<?php echo e(route('user.profile.password')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label class="lable-control" for="password">New Password</label>
              <input type="password" name="password" class="form-control"  id="password">
            </div>
            <div class="form-group">
              <label class="lable-control" for="password-confirm">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>