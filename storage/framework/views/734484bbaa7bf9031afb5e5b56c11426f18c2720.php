
<?php $__env->startSection('content'); ?>
  <div id="breadcrumb">
			<div class="container">
				<ul>

				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="<?php echo e(asset($doctor->user->avatar)); ?>" alt="" class="img-fluid" height="200px" width="200px">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
										<small><?php echo e($doctor->department->name); ?></small>
										<h1><strong><?php echo e($doctor->user->name); ?></strong></h1>
										<ul class="statistic">
											<li>854 Views</li>
											<li>124 Patients</li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Address</h6>
												Green Road, Dhaka 1200
											</li>
											<li>
												<h6>Phone</h6> <a href="tel://000434323342">+00043 4323342</a> - <a href="tel://000434323342">+00043 4323342</a></li>
										</ul>
									</div>
								</div>
							</div>

							<hr>

							<!-- /profile -->
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								<h3>Professional statement</h3>
								<p><strong><?php echo e($doctor->title); ?></strong></p>
							</div>
							<div class="wrapper_indent">
								<p>Here we are Just Using Dummy text for the details for Doctor, this section is <strong>Dynamically</strong> editable</p>
								<h6>Specializations</h6>
								<div class="row">
									<div class="col-lg-6">
										<ul class="bullets">
											<li>Abdominal Radiology</li>
											<li>Addiction Psychiatry</li>
											<li>Adolescent Medicine</li>
											<li>Cardiothoracic Radiology </li>
										</ul>
									</div>
									<div class="col-lg-6">
										<ul class="bullets">
											<li>Abdominal Radiology</li>
											<li>Addiction Psychiatry</li>
											<li>Adolescent Medicine</li>
											<li>Cardiothoracic Radiology </li>
										</ul>
									</div>
								</div>
								<!-- /row-->
							</div>
							<!-- /wrapper indent -->

							<hr>

							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Education</h3>
								<p>Dhaka Medical College and Hospital, Dhaka</p>
							</div>
							<div class="wrapper_indent">
								<p>Here we are Just Using Dummy text for the details for Doctor, this section is <strong>Dynamically</strong> editable</p>
								<h6>Curriculum</h6>
								<ul class="list_edu">
									<li><strong>Dhaka Medical College and Hospital</strong> - Doctor of Medicine</li>
									<li><strong>Dhaka Medical College and Hospital</strong> - Residency in Internal Medicine</li>
									<li><strong>Dhaka Medical College and Hospital</strong> - Master Internal Medicine</li>
								</ul>
							</div>
							<!--  End wrapper indent -->

							<hr>

							<div class="indent_title_in">
								<i class="pe-7s-cash"></i>
								<h3>Prices &amp; Payments</h3>
								<p>Here We are using Static data, but it is possible to make it dynamic.</p>
							</div>
							<div class="wrapper_indent">
								<p>Here we are Just Using Dummy text for the details for Doctor, this section is <strong>Dynamically</strong> editable</p>
								<table class="table table-responsive table-striped">
									<thead>
										<tr>
											<th>Service - Visit</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>New patient visit</td>
											<td>1500</td>
										</tr>
										<tr>
											<td>General consultation</td>
											<td>1000</td>
										</tr>
										<tr>
											<td>Back Pain</td>
											<td>800</td>
										</tr>
										<tr>
											<td>Diabetes Consultation</td>
											<td>700</td>
										</tr>
										<tr>
											<td>Eating disorder</td>
											<td>1500</td>
										</tr>
										<tr>
											<td>Foot Pain</td>
											<td>800</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!--  /wrapper_indent -->
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
				</div>
				<!-- /col -->
				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						
							<div class="title">
							<h3>Book a Visit</h3>
							<strong>Monday to Friday <?php echo e($doctor->user->description); ?></strong>
							</div>
							<!-- /row -->
							<ul class="treatments clearfix">
								<li>
									<div class="checkbox">
										<input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
										<label for="visit1" class="css-label"><?php echo e($doctor->department->name); ?> <strong><?php echo e($doctor->bill); ?> tk</strong></label>
									</div>
								</li>
							</ul>
							<hr>
							<?php if(Auth::user()): ?>
                <a href="<?php echo e(route('patient.appointment.take',['id' => $doctor->id])); ?>" class="btn_1 full-width"><strong>Book Now</strong></a>
              <?php else: ?>
                <div class="message">
      						<p>Want an appointment? <a href="/login">Click here to login</a></p>
      					</div>
              <?php endif; ?>
						
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>