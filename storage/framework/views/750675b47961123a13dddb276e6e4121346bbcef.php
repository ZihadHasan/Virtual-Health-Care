<div class="col-lg-4">
  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Doctor
    </div>
    <div class="panel-body">
      <?php if($user->avatar): ?>
        <img src="<?php echo e(asset($user->avatar)); ?>" alt="your img" height="100px" width="80px">
      <?php else: ?>
        <span class="alert alert-danger">Please Add an Image</span>
      <?php endif; ?><br><br>
      <big><b><?php echo e($user->name); ?></b></big> (<?php echo e($user->doctor->title); ?>)<br>
      <b><?php echo e($user->doctor->department->name); ?></b><br>
      <big><?php echo e($user->email); ?></big><br>
      <big><?php echo e($user->phone); ?></big><br>
      <big><address><b>Objectives :</b> <br><?php if($user->description): ?><?php echo e($user->description); ?><?php else: ?> <span class="alert-danger">Please Add your Address</span><?php endif; ?></address></big>
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
        <a href="<?php echo e(route('doctor.appointment.index')); ?>">
          <li class="list-group-item">Pending Appointments</li>
        </a>
        <a href="<?php echo e(route('doctor.patient.list',['id' => Auth::user()->doctor->id])); ?>">
          <li class="list-group-item">Your Patients</li>
        </a>
      </ul>
    </div>
  </div>
</div>
