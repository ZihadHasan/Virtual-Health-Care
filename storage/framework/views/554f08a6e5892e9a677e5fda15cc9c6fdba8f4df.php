<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">

    <?php echo $__env->make('admin.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="row">
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
          <div class="alert alert-info">
            <div class="row">
              <div class="col-lg-4 col-lg-offset-1">
                <b>To</b><br>
                <b><?php echo e($pre->patient->user->name); ?></b>
              </div>
              <div class="col-lg-4 col-lg-offset-1">
                <b>By</b><br>
                <b><?php echo e($pre->doctor->user->name); ?></b>
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="panel panel-primary">
              <div class="panel-heading"><center><h4>Prescription</h4></center></div>
              <div class="panel-body">
                <form>
                  <div class="form-group">
                    <textarea rows="8" cols="80" class="form-control" disabled>
                      <?php echo e($pre->body); ?>

                    </textarea>
                  </div>
                </form>
              </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>