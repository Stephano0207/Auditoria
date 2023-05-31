<!DOCTYPE html>
<!--
	Salient by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estrella's - Tienda Tecnológica</title>

  <!-- Custom Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,300,700' rel='stylesheet' type='text/css'>
  <link href="http://fonts.googleapis.com/css?family=Crimson+Text:400,600" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS Style -->
  <link rel="stylesheet" href="/intro/assets/css/bootstrap.min.css">

  <!-- Template CSS Style -->
  <link rel="stylesheet" href="/intro/assets/css/style.css">

  <!-- Animate CSS  -->
  <link rel="stylesheet" href="/intro/assets/css/animate.css">

  <!-- FontAwesome 4.3.0 Icons  -->
  <link rel="stylesheet" href="/intro/assets/css/font-awesome.min.css">

  <!-- et line font  -->
  <link rel="stylesheet" href="/intro/assets/css/et-line-font/style.css">

  <!-- BXslider CSS  -->
  <link rel="stylesheet" href="/intro/assets/css/bxslider/jquery.bxslider.css">

  <!-- Owl Carousel CSS Style -->
  <link rel="stylesheet" href="/intro/assets/css/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="/intro/assets/css/owl-carousel/owl.theme.css">
  <link rel="stylesheet" href="/intro/assets/css/owl-carousel/owl.transitions.css">

  <!-- Magnific-Popup CSS Style -->
  <link rel="stylesheet" href="/intro/assets/css/magnific-popup/magnific-popup.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	
</head>
<body>

  <!-- Preload the Whole Page -->
  <div id="preloader">      
    <div id="loading-animation">&nbsp;</div>
  </div>

  <!-- Navbar -->
  <header class="header">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand" href="{{url('/dashboard')}}">ESTRELLA'S</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-nav">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a class="section-scroll" href="#wrapper">Inicio</a></li>
            <li><a href="{{ route('shop') }}">Tienda</a></li>

        @if (Auth::guest())
        <li><a class="nav-link"    href="{{route('login')}}" >
              INICIAR SESION
            </a>
        </li>
        @else
        <li><a class="nav-link"    href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              CERRAR SESION
            </a>
        </li>
        @endif

     

           @can('admin.home')
           <li><a href="{{route('home')}}">Administrador</a></li>
           @endcan
            

            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                @csrf
              </form>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>
  <!-- End Navbar -->

  <div id="wrapper">

  <!-- Hero
  ================================================== -->
    <section>
      <div id="hero-section" class="landing-hero" data-stellar-background-ratio="0">
        <div class="hero-content">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">

                <div class="hero-text">
                  <div class="herolider">
                    <ul class="caption-slides">

                      <li class="caption">
                        <h1>Un legado de calidad</h1>
                        <div class="div-line"></div>
                        <p class="hero">La mejor tecnología &amp; Calidad</p>
                      </li>

                      <li class="caption">
                        <h1>Celulares de alta gama</h1>
                        <div class="div-line"></div>
                        <p class="hero">Diseños personalizados &amp; Accesorios móviles</p>
                      </li>

                      <li class="caption">
                        <h1>PC's gamers</h1>
                        <div class="div-line"></div>
                        <p class="hero">Ultima generación en procesadores &amp; Escritores y sillas gamer</p>
                      </li>

                    </ul>
                  </div> <!-- end herolider -->
                </div> <!-- end hero-text -->

                <div class="hero-btn">
                  <a href="#landing-offer" class="btn btn-clean">Read more</a>
                </div> <!-- end hero-btn -->

              </div> <!-- end col-md-6 -->
            </div> <!-- end row -->
          </div> <!-- End container -->
        </div> <!-- End hero-content -->
      </div> <!-- End hero-section -->
    </section>
    <!-- End hero section -->

    <!-- Offer
    ================================================== -->
    
    <!-- End offer section -->

    

    <!-- Features services
    ================================================== -->

    <!-- End features-section -->

    <!-- Video section
    ================================================== -->
  
    <!-- End Video section -->

    <!-- Team
    ================================================== -->
 
    <!-- End team section -->

    <!-- About Team
    ================================================== -->

    <!-- End About Team -->

    <!-- Banner-Services
    ================================================== -->
    <section>
      <div id="banner-services" data-stellar-background-ratio="0">
        <div class="container">
          <div class="row">

            <div class="col-sm-6">
              <div class="banner-content animated out" data-animation="fadeInUp" data-delay="0">
                <h3 class="banner-heading">Necesitas las mejores computadoras del mercado?</h3>
                <div class="banner-decription">
                  Aquí encontrarás lo que tanto buscas!
                </div> <!-- end banner-decription -->
                <div>
                  {{-- <a href="contact.html" class="btn btn-sm btn-clean">Lets talk</a> --}}
                </div>
              </div> <!-- end banner-content -->
            </div> <!-- end col-sm-6 -->

            <div class="col-sm-6">
              <div class="banner-image animated out" data-animation="fadeInUp" data-delay="0">
                <img src="/intro/assets/images/temp/banner-img.png" alt="">
              </div> <!-- end banner-image -->
            </div> <!-- end col-sm-6 -->
            
          </div> <!-- end row -->
        </div> <!-- end container -->
      </div>
    </section>
    <!-- End Banner services section -->

    <!-- Features App 2
    ================================================== -->
    
    <!-- End Features App 2 section -->

  

    <!-- Creative section-1
    ================================================== -->
 
    <!-- End Creative section-1 -->

    

    <!-- Screenshots
    ================================================== -->
     
      <!-- End screenshots-section -->

      <!-- Clients-section
    ================================================== -->
    <section>
      <div id="clients-section" class="clients-bg" data-stellar-background-ratio="0">
        <div class="container">
          <div class="row">
             
             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/s.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/i.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/a.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/x.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/ip.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

             <!-- client -->
            <div class="col-xs-4 col-sm-2">
              <div class="client">
                <a href="#"><img src="/intro/assets/images/clients/n.png" alt=""></a>
              </div>
            </div> <!-- end col-xs-6 -->

          </div> <!-- End row -->
        </div> <!-- End container -->
      </div> 
    </section>
    <!-- End clients-section -->

    <!-- Prices
    ================================================== -->
   
    <!-- End prices section -->

    <!-- Subscribe-section
    ================================================== -->
    
      <!-- end testimonial section -->

  

    <!-- Google map
    ================================================== -->
   
    <!-- End Google map -->

    <!-- Contact-section
    ================================================== -->
   

    <!-- Contact-info
    ================================================== -->
    
    <!-- Footer
    ================================================== -->
    <footer>
        <div id="footer-section" class="text-center">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <ul class="footer-social-links">
                  <li><a href="#">Facebook</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Dribbble</a></li>
                  <li><a href="#">Behance</a></li>
                  <li><a href="#">Pinterest</a></li>
                </ul>
                <p class="copyright">
                  &copy; 2022 Estrella's <a href="http://templatestock.co"></a>
                </p>
              </div> <!-- End col-sm-8 -->
            </div> <!-- End row -->
          </div> <!-- End container -->
        </div> <!-- End footer-section  -->
      </footer>
      <!-- End footer -->
    
    </div> <!-- End wrapper -->
    
    <!-- Back-to-top
    ================================================== -->
    <div class="back-to-top">
      <i class="fa fa-angle-up fa-3x"></i>
    </div> <!-- end back-to-top -->
    
    <!-- JS libraries and scripts -->
    <script src="/intro/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/intro/assets/js/bootstrap.min.js"></script>
    <script src="/intro/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="/intro/assets/js/jquery.appear.min.js"></script>
    <script src="/intro/assets/js/jquery.bxslider.min.js"></script>
    <script src="/intro/assets/js/jquery.owl.carousel.min.js"></script>
    <script src="/intro/assets/js/jquery.countTo.js"></script>
    <script src="/intro/assets/js/jquery.easing.1.3.js"></script>
    <script src="/intro/assets/js/jquery.imagesloaded.min.js"></script>
    <script src="/intro/assets/js/jquery.isotope.js"></script>
    <script src="/intro/assets/js/jquery.placeholder.js"></script>
    <script src="/intro/assets/js/jquery.smoothscroll.js"></script>
    <script src="/intro/assets/js/jquery.stellar.min.js"></script>
    <script src="/intro/assets/js/jquery.waypoints.js"></script>
    <script src="/intro/assets/js/jquery.fitvids.js"></script>
    <script src="/intro/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/intro/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/intro/assets/js/jquery.countdown.js"></script>
    <script src="/intro/assets/js/jquery.navbar-scroll.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="/intro/assets/js/jquery.gmaps.js"></script>
    <script src="/intro/assets/js/main.js"></script>

</body>
</html>