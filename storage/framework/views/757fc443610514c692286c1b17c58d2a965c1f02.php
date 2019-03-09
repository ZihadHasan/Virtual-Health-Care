
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="INFiNITE">
	<title>Doctor & Patient</title>

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
	

	<?php echo $__env->yieldContent('styles'); ?>

	<style type="text/css">
		*{
			font-size: 1rem !important;
		}
	</style>

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
      <a class="navbar-brand" href="/">Doctor & Patient</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      	<div class="col-lg-6 col-lg-offset-3">
			<form class="navbar-form navbar-left" method="get" action="/doctors/search">
				<div class="form-group">
					<input type="text" name="query" class="form-control" placeholder="Search" size="60">
				</div>
				<button style="color:white; border-radius: 0px;" type="submit" class="btn btn-primary btn-lg">Submit</button>
			</form>
      	</div>

      <ul class="nav navbar-nav navbar-right">
		<li>
			<a class="btn btn-info" href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Home</a>
		</li>
		<?php if(!Auth::user()): ?>
		<li>
			<a class="btn btn-success" href="/login"><i class="fa fa-power-off"></i> Login</a>
		</li>
		<li>
			<a class="btn btn-primary" href="/register"><i class="fas fa-user-plus"></i> Register</a>
		</li>
		<?php else: ?>
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
		<div class="container">
			<br>
		    <div class="row">
		        <?php if(Auth::check() &&  Auth::user()->isAdmin): ?>
		          <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php elseif(Auth::check() &&  Auth::user()->isPatient): ?>
		          <?php echo $__env->make('patients.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php elseif(Auth::check() && Auth::user()->isDoctor): ?>
		          <?php echo $__env->make('doctors.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php elseif(Auth::check() && Auth::user()->isAccountant): ?>
		          <?php echo $__env->make('accountants.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		        <?php endif; ?>
		      <div class="col-lg-8">
		        <?php echo $__env->yieldContent('content'); ?>
		      </div>
		    </div>
		 </div>
	</main>

	<footer>
		<div class="container">
			<div class="row">
				<div style="color: #212121 !important;" class="col-lg-6 col-lg-offset-3">
					Made by Team <strong>INFiNITE</strong> for <strong>UAP S&H Expo.</strong> <span style="color:red; font-size: 3rem;">&hearts;</span>
				</div>
			</div>
		</div>
	</footer>

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery-2.2.4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common_scripts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/functions.js')); ?>"></script>
	<script type="text/javascript">
      <?php if(Session::has('success')): ?>
        toastr.success("<?php echo e(Session::get('success')); ?>")
      <?php elseif(Session::has('info')): ?>
        toastr.info("<?php echo e(Session::get('info')); ?>")
      <?php endif; ?>
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
