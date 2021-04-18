<?php $__env->startSection('content'); ?>
  <div id="breadcrumb">
			<div class="container">
				<ul>
          Patient's Profile
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
		<div class="container margin_60">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="<?php echo e(asset($user->avatar)); ?>" alt="" class="img-fluid" height="200px" width="200px">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
										<strong>Patient</strong>
										<h1><?php echo e($user->name); ?></h1>
										<ul class="statistic">
											<li><?php echo e($user->age); ?> y old</li>
											<li>
                        <?php if($user->gender): ?>
                          Female
                        <?php else: ?>
                          Male
                        <?php endif; ?>
                      </li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Address</h6>
												<?php echo e($user->description); ?>

											</li>
											<li>
												<h6>Phone</h6> <?php echo e($user->phone); ?></li>
										</ul>
									</div>
								</div>
							</div>
              <center>
                <?php if(Auth::id() == $user->id): ?>
                  <hr>
                  <a href="<?php echo e(route('user.profile.edit')); ?>" class="btn btn-block btn-primary">Edit</a>
                <?php endif; ?>
              </center>
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>