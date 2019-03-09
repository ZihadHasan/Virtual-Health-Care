
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
		<div class="hero_home version_1">
			<div class="content">
				<h3>Find a Doctor!</h3>
				<p>
					Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
				</p>
				<form method="get" action="/doctors/search">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" name="query" class=" search-query" placeholder="Ex. Name, Specialization ....">
							<input type="submit" class="btn_search" value="Search">
						</div>
						
					</div>
				</form>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover the <strong>online</strong> appointment!</h2>
				<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Find a Doctor</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>View profile</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Book a visit</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="<?php echo e(route('list')); ?>" class="btn_1 medium">Find Doctor</a></p>

		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Most Viewed doctors</h2>
					<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
				</div>
				<div class="owl-carousel">
					<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="owl-itme">
							<div class="row">
	              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	                <div class="panel panel-success text-center">
	                  <div class="panel-heading"><?php echo e($doctor->user->name); ?></div>
	                  <div class="panel-body">
	                    <img src="<?php echo e(asset($doctor->user->avatar)); ?>" alt="<?php echo e($doctor->user->name); ?>" class="img-fluid" height="250px" width="60px"><br><br>
	                    <b><?php echo e($doctor->title); ?></b><br>
	                    <?php echo e($doctor->department->name); ?><br>
	                    <span class="alert-danger" style="padding: 2px; margin-bottom: 5px"><?php echo e($doctor->user->description); ?></span><br>
	                    <a href="<?php echo e(route('profile',['id' => $doctor->id])); ?>" class="btn btn-sm btn-primary">View Profile</a>
	                  </div>
	                </div>
	              </div>
	            </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Find your doctor</h2>
				<p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero at.</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-5 col-md-6">
					<div class="list_home">
						<div class="list_title">
							<i class="fa fa-stack-overflow"></i>
							<h3>Search by Department</h3>
						</div>
						<ul>
							<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<li><a href="<?php echo e(route('department.doctor',['id' => $dep->id])); ?>"><strong><?php echo e($i++); ?></strong><?php echo e($dep->name); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<p><img src="<?php echo e(asset('img/app_img.svg')); ?>" alt="" class="img-fluid" width="500" height="433"></p>
					</div>
					<div class="col-md-6">
						<small>Application</small>
						<h3>Download <strong>Findoctor App</strong> Now!</h3>
						<p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
							<a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
							<a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->
	</main>
	<!-- /main content -->

	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Findoctor">
							<img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="#0">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#0">FAQ</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="#0">Doctors</a></li>
						<li><a href="#0">Clinics</a></li>
						<li><a href="#0">Specialization</a></li>
						<li><a href="#0">Join as a Doctor</a></li>
						<li><a href="#0">Download App</a></li>
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
