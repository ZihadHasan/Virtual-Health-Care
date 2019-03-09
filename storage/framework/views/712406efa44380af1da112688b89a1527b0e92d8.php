<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">

    <?php echo $__env->make('admin.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


          <div class="panel panel-primary">
              <div class="panel-heading">Prescribe <?php echo e($pre->patient->user->name); ?></div>
              <div class="panel-body">
                <form action="<?php echo e(route('prescription.update',['id' => $pre->id])); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                    <label for="name">Prescription</label>
                    <textarea name="body" rows="8" cols="80" class="form-control pull-left">
                      <?php echo e($pre->body); ?>

                      </textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Save Prescription</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>