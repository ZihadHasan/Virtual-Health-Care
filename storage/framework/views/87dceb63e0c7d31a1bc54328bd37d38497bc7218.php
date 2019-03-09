
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="INFiNITE">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo e(asset('img/apple-touch-icon-57x57-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo e(asset('img/apple-touch-icon-72x72-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo e(asset('img/apple-touch-icon-114x114-precomposed.png')); ?>">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo e(asset('img/apple-touch-icon-144x144-precomposed.png')); ?>">

	<!-- BASE CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/menu.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/vendors.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.css')); ?>">
	<link href="<?php echo e(asset('css/style-front.css')); ?>" rel="stylesheet">


	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

</head>

<body>

	
	<!-- /Preload-->

	<div id="page">
	<header class="header_sticky">
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="<?php echo e(route('index')); ?>" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<nav id="menu" class="main-menu">
						<ul>
							<?php if(!Auth::user()): ?>
                <li>
                	<span><a href="/login">Login</a></span>
                </li>
                <li>
                	<span><a href="/register">Register</a></span>
                </li>
              <?php else: ?>
								<li>
									<span><a href="<?php echo e(route('home')); ?>">Home</a></span>
								</li>
								<li>
									<span>
										<a href="<?php echo e(url('/logout')); ?>"
					                      onclick="event.preventDefault();
					                               document.getElementById('logout-form').submit();">
					                      Logout
					                  </a>

					                  <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
					                      <?php echo e(csrf_field()); ?>

					                  </form>
									</span>
								</li>
							<?php endif; ?>
						</ul>
					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

	<main>
		<?php echo $__env->yieldContent('content'); ?>
	</main>
	<!-- /main content -->

	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Findoctor">
							<img src="<?php echo e(asset('img/logo.png')); ?>" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="<?php echo e(route('list')); ?>">Doctors</a></li>
						<li><a href="#0">Departments</a></li>
						<li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
						<li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://012345678"><i class="fa fa-phone-square"></i> + 0123 456 789</a></li>
						<li><a href=""><i class="fa fa-envelope"></i>  admin@uap.com </a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="#0"><i class="fa fa-facebook-official"></i></a></li>
							<li><a href="#0"><i class="fa fa-twitter-square"></i></a></li>
							<li><a href="#0"><i class="fa fa-linkedin-square"></i></a></li>
							<li><a href="#0"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2018 Findoctor</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

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
