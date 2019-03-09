<?php $__env->startSection('content'); ?>
  <div class="filters_listing">
  		<div class="container">
  			<ul class="clearfix">
  				<li><h2>All Doctors</h2></li>
  				<li></li>
  				<li></li>
  			</ul>
  		</div>
  		<!-- /container -->
  	</div>
  	<!-- /filters -->

  	<div class="container margin_60_35">
  		<div class="row">
  			<div class="col-lg-12">
  				<div class="row">
  					<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="col-md-4">
    						<div class="box_list wow fadeIn">
    							
    							<figure>
    								<a href="<?php echo e(route('profile',['id' => $doctor->id])); ?>"><img src="<?php echo e(asset($doctor->user->avatar)); ?>" class="img-fluid" alt="">
    									<div class="preview"><span>Read more</span></div>
    								</a>
    							</figure>
    							<div class="wrapper">
    								<small><?php echo e($doctor->department->name); ?></small>
    								<h3><?php echo e($doctor->user->name); ?></h3>

    								<p><?php echo e($doctor->user->description); ?></p>
    							</div>
    							<ul>
                    <li></li>
                    <li></li>
    								<li><a href="<?php echo e(route('profile',['id' => $doctor->id])); ?>">Book now</a></li>
    							</ul>
    						</div>
    					</div>
    					<!-- /box_list -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  				</div>
  				<!-- /row -->

  				<nav aria-label="" class="add_top_20">
  					<ul class="pagination pagination-sm">
  						<?php echo e($doctors->links()); ?>

  					</ul>
  				</nav>
  				<!-- /pagination -->
  			</div>
  			<!-- /col -->
  		</div>
  		<!-- /row -->
  	</div>
  	<!-- /container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>