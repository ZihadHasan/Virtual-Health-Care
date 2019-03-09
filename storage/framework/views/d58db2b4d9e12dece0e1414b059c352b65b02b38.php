<?php $__env->startSection('content'); ?>
  <?php if(Auth::check() && Auth::user()->isAdmin): ?>
    <?php echo $__env->make('admin.includes.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(Auth::check() && Auth::user()->isPatient): ?>
    <?php echo $__env->make('patients.includes.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(Auth::check() && Auth::user()->isDoctor): ?>
    <?php echo $__env->make('doctors.includes.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(Auth::check() && Auth::user()->isAccountant): ?>
    <?php echo $__env->make('accountants.includes.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>