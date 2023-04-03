<!DOCTYPE html>
<html>
    
<!-- Mirrored from limpidthemes.com/Themeforest/html/Pathshala/Pathshala-HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jun 2021 21:15:46 GMT -->
<head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="">
        <title>IPIMO - Instituto Politécnico Islâmico de Moçambique</title>

        <!-- Styles -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/owl.carousel.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/owl.theme.default.min.css" rel="stylesheet" media="screen">
        <link href="assets/css/style.css" rel="stylesheet" media="screen">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

    </head>
    <body>
        <div class="row nav-row trans-menu">
            <div class="container nav-container">
				<div class="top-navbar">
					<div class = "pull-right">
						<div class="top-nav-social pull-left">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="top-nav-login-btn pull-right">
							<a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>LOGIN</a>
						</div>
						<!--<div class="top-navbar-search pull-right">
							<i class="fa fa-search"></i>
							<input type = "text" placeholder = "Search"/>
						</div>-->
					</div>
					<div class = "clearfix"></div>
				</div> 
				<div class = "clearfix"></div>
                <nav id="pathshalaNavbar" class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pathshalaNavbarCollapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"> <img src="logo.png" width="12%" style="border-radius:50% ;" height="auto" alt=""> </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="pathshalaNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.html"><i class="fa fa-home"></i>INÍCIO</a></li>
							<li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-graduation-cap"></i>ESTUDAR NA IPIMO<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="academic.html"><i class="fa fa-certificate"></i>IPIMO QUELIMANE</a></li>
                                    <li><a href="academic.html"><i class="fa fa-child"></i>IPIMO NAMPULA</a></li>
									<li><a href="academic.html"><i class="fa fa-info-circle"></i>SOBRE NÓS</a></li>
								
                                </ul>
                            </li>
							<li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-graduation-cap"></i>CURSOS<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="academic.html"><i class="fa fa-certificate"></i>ENFERMAGEM GERAL</a></li>
                                    <li><a href="academic.html"><i class="fa fa-certificate"></i>NUTRIÇÃO DIÉTICA</a></li>
									<li><a href="academic.html"><i class="fa fa-certificate"></i>TÉCNICOS FARMÁCIA</a></li>
									<li><a href="preschool.html"><i class="fa fa-certificate"></i>TÉCNICOS MEDICINA GERAL</a></li>
									<li><a href="preschool.html"><i class="fa fa-certificate"></i>TÉCNICOS MEDICINA PREVENTIVA</a></li>
									<li><a href="preschool.html"><i class="fa fa-certificate"></i>ENFEMAGEM EM SAÚDE MATERNA INFANTIL</a></li>
                                </ul>
                            </li>
							
                            <li><a href="admission.html"><i class="fa fa-users"></i>INSCRIÇÕES</a></li>
							
							<li><a href="about.html"><i class="fa fa-info-circle"></i>NOTÍCIAS</a></li>
						
							<li><a href="contact.html"><i class="fa fa-phone-square"></i>CONTACTO</a></li>
						
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>

        @yield('conteudo')

		<!-- Footer Section -->
		<div class="row footer-row">
			<div class="container">
				<div class="school-logo">
					<i class="fa fa-graduation-cap"></i>
					<h3>PATHSHALA</h3>
					<h6>BETTER WAY TO LEARN & GROW</h6>
				</div>
				<div class="col-md-4 col-sm-6 footer-item">
					<h5>CONTACT US</h5>
					<p><i class="fa fa-map-marker"></i>3768 Seabury Ct, Burlington, NC, 27215</p>
					<p><i class="fa fa-mobile"></i> +1 8910000891</p>
					<p><i class="fa fa-envelope"></i>email@pathshala.com</p>
				</div>
				<div class="col-md-2 col-sm-6 footer-item">
					<h5>QUICK LINKS</h5>
					<div class="quick-link-box">
						<a href="#"><i class="fa fa-graduation-cap"></i>Academics</a>
						<a href="#"><i class="fa fa-users"></i>Admission</a>
						<a href="#"><i class="fa fa-calendar"></i>Events</a>
						<a href="#"><i class="fa fa-thumbs-up"></i>Campus Life</a>
					</div>
				</div>
				<div class="clearfix visible-sm"></div>
				<div class="col-md-3 col-sm-6 footer-item">
					<h5>SCHOOL TIMINGS</h5>
					<p><i class="fa fa-clock-o"></i> MON - FRI 9:00 AM - 3:00 PM</p>
					<p><i class="fa fa-clock-o"></i> SAT 9:00 AM - 1:00 PM</p>
				</div>
				<div class="col-md-3 col-sm-6 footer-item">
					<h5>SUBSCRIBE</h5>
					<div class="footer-subscribe">
						<i class="fa fa-envelope"></i></a><input type="text" placeholder="example@pathshala.com" />
					</div>
					<a href="#" class="subscribe-link"><i class="fa fa-paper-plane"></i>SUBMIT</a>
				</div>
			</div>
			<div class="footer-social-row">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
		
		<!-- Login Modal -->
		<!-- Modal -->
		<div class="modal fade" id="loginModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content login-modal">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-sign-in"></i>LOGIN</h4>
					</div>
					<div class="modal-body">
						<div>
							<label><i class="fa fa-user"></i>USERNAME/EMAIL</label>
							<input class="form-control" type="text" placeholder="Username/Email">
						</div>
						<div>
							<label><i class="fa fa-key"></i>PASSWORD</label>
							<input class="form-control" type="password" placeholder="Password">
						</div>
						<a href="#" class="forgot-link">FORGOT PASSWORD?</a>
						<a href="#" class="login-link"><i class="fa fa-sign-in"></i>LOGIN</a>
					</div>
				</div>
			</div>
		</div>
		
        <!-- Scripts -->
        <script src="assets/js/jQuery_v3_2_0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/owl.carousel.min.js"></script>
        <script src="assets/js/js.js"></script>
		
    </body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh-oh'},{'server':'sg2plzcpnl466829'},{'id':'7770191'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='../../../../../img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
<!-- Mirrored from limpidthemes.com/Themeforest/html/Pathshala/Pathshala-HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jun 2021 21:17:34 GMT -->
</html>