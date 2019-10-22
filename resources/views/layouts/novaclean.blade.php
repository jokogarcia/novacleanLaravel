
<!DOCTYPE html>
<!--[if IE 8]> ff8a06 <html lang="es" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>NovaCLEAN @yield('subtitle')</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="/custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="/css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css?v=2.1.5" media="screen" />	
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="/css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <!-- Preloader -->

        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                </div>
            </div>
        </div>

        <!--End off Preloader -->

        <!-- Header -->
        <header>
            <!-- Top Navbar -->
            <div class="top_nav">
                <div class="container">
                    
                </div>
            </div><!-- Top Navbar end -->

            <!-- Navbar -->
            <nav class="navbar bootsnav">
                <!-- Top Search -->
                

                <div class="container">
                    <!-- Atribute Navigation -->
                    
                    <!-- Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href=""><img class="logo" src="/images/logo_chico.png" alt="NovaCLEAN"></a>
                    </div>
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav menu">
                            <li><a href="">Inicio</a></li>                    
                            <li><a href="/index.php#about">Filosofía</a></li>
                            <li><a href="/index.php#services">Servicios</a></li>
                            <li><a href="/work_with_us">Trabajá con nosotros</a></li>
                            <li><a href="/index.php#contact_form">Contáctenos</a></li>
                            @if(auth()->user())
                            <li><a href='/home'>Panel de usuario</a></li>
                            <li><a href='/logout'>Cerrar sesión</a></li>
                            @else
                            <li><a href='/login'>Iniciar sesión</a></li>
                            <li><a href='/register'>Registrarse</a></li>
                            @endif
                        </ul>
                    </div>
                </div>   
            </nav><!-- Navbar end -->
        </header><!-- Header end -->
        
        @yield('content')
        
<!-- Footer -->
        <footer>
            <!-- Footer top -->
            <div class="container footer_top">
                <div class="row">
                    <div class="col-lg-4 col-sm-7">
                        <div class="footer_item">
                            <h4>Acerca de nosotros</h4>
                            <img class="logo" src="/images/logonuevo.png" alt="Logo" />
                            <p>Somos una empresa pensada para brindar soluciones a nivel regional y nacional, dedicada a los servicios de limpieza y mantenimiento en general, en el sector público y privado.</p>

                            <ul class="list-inline footer_social_icon">
                                <li><a href=""><span class="fa fa-facebook"></span></a></li>
                                <li><a href=""><span class="fa fa-twitter"></span></a></li>
                                <li><a href=""><span class="fa fa-youtube"></span></a></li>
                                <li><a href=""><span class="fa fa-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
					 <!-- <li><a href="">Inicio</a></li>                     -->
                            <!-- <li><a href="#about">Sobre nosotros</a></li> -->
                            <!-- <li><a href="#services">Servicios</a></li> -->
                            <!-- <li><a href="#portfolio">Nuestros clientes</a></li> -->
                            <!-- <li><a href="#contact_form">Contáctenos</a></li> -->
                    <div class="col-lg-2 col-sm-5">
                        <div class="footer_item">
                            <h4>Enlaces</h4>
                            <ul class="list-unstyled footer_menu">
                                <li><a href="#services"><span class="fa fa-play"></span> Nuestros Servicios</a>
                                <li><a href="#about"><span class="fa fa-play"></span> Nuestra filosofía</a>
								<li><a href="trabajaconnosotros.html"><span class="fa fa-play"></span> Trabajá con nosotros</a>
                                <li><a href=""><span class="fa fa-play"></span> Uso Interno</a>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-5">
                        <div class="footer_item">
                            <h4>Contáctenos</h4>
                            <ul class="list-unstyled footer_contact">
                                <li><a href="https://www.google.com/maps/place/Mil%C3%A1n+693,+F5300+La+Rioja/@-29.4225177,-66.8520562,17z/data=!3m1!4b1!4m5!3m4!1s0x9427da31885518c9:0x8a6adaef039605d1!8m2!3d-29.4225177!4d-66.8498675"><span class="fa fa-map-marker"></span> Milán 693 - B° Ferroviario, La Rioja, Argentina</a></li>
                                <li><a href="mailto:info@novaclean.com.ar"><span class="fa fa-envelope"></span> info@novaclean.com.ar</a></li>
                                <li><span class="fa fa-mobile"></span><p><a href="tel:+5493804921246">+54 9 380 492-1246</a><br /><a href="tel:+5493804489101">+54 9 380 448-9101</a></p></li>
                            </ul>
                        </div>
                    </div>
					
					<div class="col-lg-3 col-sm-5">
                        <div class="footer_item">
                            <a href="https://www.pactomundial.org"><h4>Pacto Global de la ONU</h4></a>
                            <!--<a href="https://www.pactomundial.org"><img classs="logo" src="/images/pactoGlobal.svg"/></a> -->
							<p>Adherimos al <a href="https://www.pactomundial.org"><b>Pacto mundial de Naciones Unidas</b></a>. Este es un acuerdo entre empresas de todo el mundo para forjar un compromiso de desarrollo sustentable y protección del medio ambiente. Te invitamos a conocer más haciendo click en el enlace.
                        </div>
                    </div>
                </div>
            </div><!-- Footer top end -->

            <!-- Footer bottom -->
            <div class="footer_bottom text-center">
                <p class="wow fadeInRight">
                    Realización de <a href="https://www.livery.com.ar/grupo">Grupo Lívery</a> La Rioja, Argentina. Con ayuda de 
                    <a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a> 
                    2019. Todos los derechos reservados.
                </p>
            </div><!-- Footer bottom end -->
        </footer><!-- Footer end -->

        <!-- JavaScript -->
        <script src="/js/jquery-1.12.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <!-- Bootsnav js -->
        <script src="/js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="/js/isotope.js"></script>
        <script src="/js/isotope-active.js"></script>
        <script src="/js/jquery.fancybox.js?v=2.1.5"></script>

        <script src="/js/jquery.scrollUp.min.js"></script>

        <script src="/js/main.js"></script>
    </body>	
</html>	