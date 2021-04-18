<?php if(count($errors) > 0): ?>
  <ul class="list-group">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li class="list-group-item text-danger text-center">
            <strong><?php echo e($error); ?></strong>
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </ul>
<?php endif; ?>
