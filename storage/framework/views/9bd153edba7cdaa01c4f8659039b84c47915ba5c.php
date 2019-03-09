<div class="col-lg-4">
  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Patient
    </div>
    <div class="panel-body">
      <?php if($user->avatar): ?>
        <img src="<?php echo e(asset($user->avatar)); ?>" alt="your img" height="100px" width="80px">
      <?php else: ?>
        <span class="alert alert-danger">Please Add an Image</span>
      <?php endif; ?><br><br>
      <big><b><?php echo e($user->name); ?></b></big><br>
      <big><?php echo e($user->email); ?></big><br>
      <big><?php echo e($user->phone); ?></big><br>
      <big><address><b>Address :</b> <br><?php if($user->description): ?><?php echo e($user->description); ?><?php else: ?> <span class="alert-danger">Please Add your Address</span><?php endif; ?></address></big>
      <a href="<?php echo e(route('user.profile.edit')); ?>" class="btn btn-block btn-primary">Edit</a>
    </div>
  </div>


  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Quick Links
    </div>
    <div class="panel-body">
      <ul class="list-group">
        <a href="<?php echo e(route('home')); ?>">
          <li class="list-group-item">Home</li>
        </a>
        <a href="<?php echo e(route('patient.appointment.index')); ?>">
          <li class="list-group-item">Appointments</li>
        </a>
        <a href="<?php echo e(route('patient.appointment.doctors')); ?>">
          <li class="list-group-item">Find Doctors</li>
        </a>
      </ul>
    </div>
  </div>
</div>
