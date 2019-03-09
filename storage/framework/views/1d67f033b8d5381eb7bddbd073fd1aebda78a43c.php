
<?php $__env->startSection('content'); ?>
  <div class="panel panel-default">
    <div class="panel-heading ehealth">
      Select a Department
    </div>
    <div class="panel-body">
      <form class="form-inline text-center" action="<?php echo e(route('patient.appointment.department.submit')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <select class="form-control" name="department_id">
            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <option <?php if($find): ?><?php if($result->id == $department->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" value="Get Doctors" class="btn btn-sm btn-primary">
        </div>
      </form>
    </div>
  </div>
  <?php if($find): ?>
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        Doctors from <?php echo e($result->name); ?>

      </div>
      <div class="panel-body">
        <?php if($doctors->count() > 0): ?>
          <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <div class="panel panel-success text-center">
                  <div class="panel-heading"><?php echo e($doctor->user->name); ?></div>
                  <div class="panel-body">
                    <img src="<?php echo e(asset($doctor->user->avatar)); ?>" alt="your img" height="45px" width="45px"><br><br>
                    <b><?php echo e($doctor->title); ?></b><br>
                    <?php echo e($doctor->department->name); ?><br>
                    <span class="alert-danger" style="padding: 2px; margin-bottom: 5px"><?php echo e($doctor->user->description); ?></span><br>
                    <a href="<?php echo e(route('patient.appointment.take',['id' => $doctor->id])); ?>" class="btn btn-sm btn-primary">Take Appointment</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php else: ?>
          <div class="alert alert-warning">
            No Doctors Found For <?php echo e($result->name); ?>

          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>