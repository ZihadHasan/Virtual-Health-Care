
<?php $__env->startSection('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 text-center">
      <h2>Result for <span class="search"><?php echo e($query); ?></span></h2>
    </div>
  </div>
</div>
 
<div class="container"> 

  <?php if($doctors->count() > 0): ?>
        <div class="row">
          <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
              <div class="panel panel-primary text-center">
                <div class="panel-heading"><strong><?php echo e($doctor->name); ?></strong></div>
                <div class="panel-body">
                  <img src="<?php echo e(asset($doctor->avatar)); ?>" alt="<?php echo e($doctor->name); ?>" class="img-fluid" height="200px" width="200px"><br><br>
                  <b><?php echo e($doctor->title); ?></b><br>
                  <?php echo e($doctor->doctor->department->name); ?><br>
                  <span class="alert-danger" style="padding: 2px; margin-bottom: 5px"><?php echo e($doctor->description); ?></span><br>
                  <a href="<?php echo e(route('profile',['id' => $doctor->doctor->id])); ?>" class="btn btn-sm btn-primary"><strong>View profile</strong></a>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>

        <div class="text-center">
          <?php echo e($doctors->links()); ?>

        </div>

  <?php else: ?>
      <div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
          <div class="alert alert-danger text-center">
              No Doctors found by <?php echo e($query); ?>

          </div>
      </div>
  <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>