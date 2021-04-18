
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="INFiNITE">
	<title>Digital Healthcare</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo e(asset('img/apple-touch-icon-57x57-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo e(asset('img/apple-touch-icon-72x72-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo e(asset('img/apple-touch-icon-114x114-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo e(asset('img/apple-touch-icon-144x144-precomposed.png')); ?>">

	<!-- BASE CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	
	<link href="<?php echo e(asset('css/style-front.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/menu.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/vendors.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  	<link rel="stylesheet" href="<?php echo e(asset('css/toastr.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

</head>

<body>

<nav style="padding-bottom: 5px;" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Digital Healthcare</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      	<div class="col-lg-6 col-lg-offset-3">
			<form class="navbar-form navbar-left" method="get" action="/doctors/search">
				<div class="form-group">
					<input type="text" name="query" class="form-control" placeholder="Search" size="80">
				</div>
				<button style="color:white; border-radius: 0px;" type="submit" class="btn btn-primary btn-lg">Submit</button>
			</form>
      	</div>

      <ul class="nav navbar-nav navbar-right">
		<?php if(!Auth::user()): ?>
		<li>
			<a class="btn btn-success" href="/login"><i class="fa fa-power-off"></i> Login</a>
		</li>
		<li>
			<a class="btn btn-primary" href="/register"><i class="fa fa-user-plus"></i> Register</a>
		</li>
		<?php else: ?>
		<li>
			<a class="btn btn-info" href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			<a class="btn btn-danger" href="<?php echo e(url('/logout')); ?>"
			onclick="event.preventDefault();
			document.getElementById('logout-form').submit();">
			<i class="fa fa-power-off"></i> Logout
			</a>

			<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			<?php echo e(csrf_field()); ?>

			</form>
		</li>
		<?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<main>
		<div class="hero_home version_1" style="height: 85vh;">
			<div class="content">
				<h3>Digital Healthcare</h3>
				<p>
					Easy Way to Get consulted with a doctor!
				</p>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover the <strong>online</strong> appointment!</h2>
				<p>Here are the guidance to your first Appointment to doctor in our Application.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3 style="font-size: 3rem;">Find a Doctor</h3>
						<p>Use the <strong>search option</strong> in the top navigation bar for finding the doctor by the name you know.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3 style="font-size: 3rem;">View profile</h3>
						<p>Check the profile of the doctor by clicking on <strong>View profile</strong> button and confirm that's the doctor you want.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3 style="font-size: 3rem;">Book a visit</h3>
						<p>You can use the button <strong>Book a Visit</strong> to confirm the appointment, the rest of the work is our's , enjoy.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a style="font-size: 3rem;" href="<?php echo e(route('list')); ?>" class="btn_1 medium">Find Doctor</a></p>

		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Most Viewed doctors</h2>
					<p>Here are the top three doctors, patients found helpful the most.</p>
				</div>
					
            	
				<div class="row">
					<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
		                <div class="panel panel-primary text-center">
		                  <div class="panel-heading"><strong><?php echo e($doctor->user->name); ?></strong></div>
		                  <div class="panel-body">
		                    <img src="<?php echo e(asset($doctor->user->avatar)); ?>" alt="<?php echo e($doctor->user->name); ?>" class="img-fluid" height="200px" width="200px"><br><br>
		                    <b><?php echo e($doctor->title); ?></b><br>
		                    <?php echo e($doctor->department->name); ?><br>
		                    <span class="alert-danger" style="padding: 2px; margin-bottom: 5px"><?php echo e($doctor->user->description); ?></span><br>
		                    <a href="<?php echo e(route('profile',['id' => $doctor->id])); ?>" class="btn btn-sm btn-primary"><strong>View Profile</strong></a>
		                  </div>
		                </div>
		              </div>
	              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	            </div>
          
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Find your doctor</h2>
				<p>You can find your doctor by department you want , Easy Doctor Finding.</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-6 col-md-6 col-lg-offset-3">
					<div class="list_home">
						<div class="list_title">
							<i class="fa fa-stack-overflow"></i>
							<strong>Search by Department</storng>
						</div>
						<ul>
							<?php if($departments->count() > 0): ?>
								<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<li><a href="<?php echo e(route('department.doctor',['id' => $dep->id])); ?>"><strong><?php echo e($i++); ?></strong><?php echo e($dep->name); ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main content -->
	<footer>
		<div class="container">
			<div class="row">
				<div style="color: #212121 !important;" class="col-lg-6 col-lg-offset-3">
					Made by <strong>Group5</strong> for <strong>Software Development Project</strong> <span style="color:red; font-size: 3rem;">&hearts;</span>
				</div>
			</div>
		</div>
	</footer>

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo e(asset('js/jquery-2.2.4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common_scripts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/functions.js')); ?>"></script>
	<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$(".owl-carousel").owlCarousel();
		});
	</script>

</body>

</html>
