<!doctype html><html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('provider_name') | 2urkeyBooking.com</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
<!--     Fonts and icons     -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
</head>
<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-city.jpg')">
		<!--   Creative Tim Branding   -->
		<a href="#">
			<div class="logo-container">
				<div class="logo">
					<img src="@yield('provider_image')" style="border-radius:50%" width="50px">
					</div>
					<div class="brand">
                @yield('provider_name')
            </div>
				</div>
			</a>
			<!--   Big container   -->
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<!--      Wizard container        -->
											@yield('content')
												<!-- wizard container -->
											</div>
										</div>
										<!-- row -->
									</div>
									<!--  big container -->
									<div class="footer">
										<div class="container">
             					Made with
											<i class="fa fa-heart heart"></i> by
											<a href="http://www.creative-tim.com">Creative Tim</a>. Free download
											<a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
										</div>
									</div>
								</div>
							</body>
							<!--   Core JS Files   -->
							<!-- <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script> -->
							@yield('script')
                            <script src="/plugins/jquery/jquery.min.js"></script>
							<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
							<script src="/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
							<!--  Plugin for the Wizard -->
							<script src="/assets/js/gsdk-bootstrap-wizard.js"></script>
							<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
							<script src="/assets/js/jquery.validate.min.js"></script>
						</html>
