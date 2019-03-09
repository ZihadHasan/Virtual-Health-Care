<div class="col-lg-4">
  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Accountant
    </div>
    <div class="panel-body">
      <?php if($user->avatar): ?>
        <img src="<?php echo e(asset($user->avatar)); ?>" alt="your img" height="100px" width="80px">
      <?php else: ?>
        <span class="alert alert-danger">Please Add an Image</span>
      <?php endif; ?><br><br>
      <big><b><?php echo e($user->name); ?></b></big><br>
      <big><?php echo e($user->email); ?></big><br>
      <big><?php echo e($user->phone); ?></big><br><br>
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
        <a href="<?php echo e(route('accountant.appointment.recieption')); ?>">
          <li class="list-group-item">Recieption</li>
        </a>
        <a href="<?php echo e(route('accountant.unverified.appointment.list')); ?>">
          <li class="list-group-item">Unverified Appointments</li>
        </a>
        <a href="<?php echo e(route('accountant.verified.appointment.list')); ?>">
          <li class="list-group-item">Verified Appointments</li>
        </a>
      </ul>
    </div>
  </div>
</div>
